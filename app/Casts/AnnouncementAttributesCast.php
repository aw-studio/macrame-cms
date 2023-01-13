<?php

namespace App\Casts;

use App\Http\Resources\ImageResource;
use App\Http\Resources\Wrapper\Image;
use App\Models\File;
use Macrame\Content\ContentCast;

class AnnouncementAttributesCast extends ContentCast
{
    /**
     * Parse items.
     *
     * @param  array  $items
     * @return $this
     */
    public function parse()
    {
        if (! is_array($this->items)) {
            return $this;
        }

        $image = array_key_exists('image', $this->items) ? $this->items['image'] : null;

        if ($image) {
            $image = File::query()
                ->where('id', $image['id'] ?? null)
                ->first();

            $image = new Image(
                $image,
                array_key_exists('alt', $this->items['image']) ? $this->items['image']['alt'] : '',
                array_key_exists('title', $this->items['image']) ? $this->items['image']['title'] : '',
            );
        }

        // For any item, we want to make sure routes are replaced with actual links
        array_walk_recursive($this->items, function (&$value) {
            $value = preg_replace_callback('/"(route:\/\/.*?)"/', function ($match) {
                return '"'.LinkResolver::urlFromLink($match[1]).'"';
            }, $value);
        });

        return [
            ...$this->items,
            'image' => $image ? (new ImageResource($image))->toArray(request()) : null,
        ];
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
