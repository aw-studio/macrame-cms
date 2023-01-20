<?php

namespace App\Casts;

use App\Casts\Resolver\LinkResolver;
use App\Http\Resources\ImageResource;
use App\Http\Resources\Wrapper\Image;
use App\Models\File;
use Macrame\Content\ContentCast;
use Macrame\Content\Contracts\Parser;

class PageAttributesCast extends ContentCast
{
    /**
     * Parse items.
     *
     * @param  array  $items
     * @return $this
     */
    public function parse()
    {
        static $parsed = false;

        if ($parsed) {
            return $this;
        }

        if (! is_array($this->items)) {
            return $this;
        }

        // og image
        $og_image = File::query()
            ->where('id', $this->items['meta_og_image']['id'] ?? null)
            ->first();
        $this->items['meta_og_image_url'] = $og_image ? $og_image->getUrl() : null;

        $this->items = match ((string) $this->model->template) {
            'default' => $this->defaultTemplate($this->items),
            'home' => $this->homeTemplate($this->items),
            default => $this->items
        };

        // For any item, we want to make sure routes are replaced with actual links
        array_walk_recursive($this->items, function (&$value, $key) {
            if ($value instanceof Parser || $key == 'items') {
                return;
            }

            $value = preg_replace_callback('/"(route:\/\/.*?)"/', function ($match) {
                return '"'.LinkResolver::urlFromLink($match[1]).'"';
            }, $value);
        });

        $parsed = true;

        return $this;
    }

    public function defaultTemplate(array $items)
    {
        $header = array_key_exists('header', $items) ? $items['header'] : null;
        if ($header) {
            $image = File::query()
                ->where('id', $items['header']['id'] ?? null)
                ->first();

            $image = new Image(
                $image,
                array_key_exists('alt', $header) ? $header['alt'] : '',
                array_key_exists('title', $header) ? $header['title'] : '',
            );
        }

        return [
            ...$items,
            'header' => $header ? (new ImageResource($image))->toArray(request()) : null,
        ];
    }

    public function homeTemplate(array $items)
    {
        return $items;
    }

    public function __get($key)
    {
        $this->parse();

        if (! array_key_exists($key, $this->items)) {
            return null;
        }

        return $this->items[$key];
    }
}
