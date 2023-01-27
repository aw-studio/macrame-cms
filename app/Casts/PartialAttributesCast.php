<?php

namespace App\Casts;

use App\Http\Resources\ImageResource;
use App\Http\Resources\Wrapper\Image;
use App\Models\File;
use Macrame\Content\ContentCast;

class PartialAttributesCast extends ContentCast
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
        $this->items = match ((string) $this->model->template) {
            'default' => $this->defaultTemplate($this->items),
            'header' => $this->headerTemplate($this->items),
            default => $this->items
        };

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

    public function headerTemplate(array $items)
    {
        $logo = array_key_exists('logo', $items) ? $items['logo'] : null;
        if ($logo) {
            $image = File::query()
                ->where('id', $items['logo']['id'] ?? null)
                ->first();

            $image = new Image(
                $image,
                array_key_exists('alt', $logo) ? $logo['alt'] : '',
                array_key_exists('title', $logo) ? $logo['title'] : '',
            );
        }

        return [
            ...$items,
            'logo' => $logo ? (new ImageResource($image))->toArray(request()) : null,
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
