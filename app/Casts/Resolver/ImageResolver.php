<?php

namespace App\Casts\Resolver;

use App\Http\Resources\Wrapper\Image;
use App\Models\File;

class ImageResolver
{
    /**
     * Resolve Image from the a given array.
     *
     * @param  array  $image
     * @param  string|null  $alt
     * @param  string|null  $title
     * @return Image|null
     */
    public static function fromArray(array $image, string $alt = null, string $title = null)
    {
        if (! array_key_exists('id', $image)) {
            return null;
        }

        $file = File::query()
            ->where('id', $image['id'])
            ->first();

        if (! $file) {
            return null;
        }
        $alt = $alt ?? array_key_exists('alt', $image) ? $image['alt'] : null;
        $title = $title ?? array_key_exists('title', $image) ? $image['title'] : null;

        return new Image(
            $file,
            $alt,
            $title,
        );
    }
}
