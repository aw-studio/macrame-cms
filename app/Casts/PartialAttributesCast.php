<?php

namespace App\Casts;

use App\Casts\BaseCasts\BaseContentCast;
use App\Http\Resources\Wrapper\Image;
use App\Models\File;

class PartialAttributesCast extends BaseContentCast
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
            'header' => $this->headerTemplate($this->items),
            default => $this->items
        };

        return $this;
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

            $items['logo'] = $image;
        }

        return $this;
    }
}
