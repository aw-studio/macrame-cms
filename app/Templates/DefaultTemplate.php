<?php

namespace App\Templates;

use App\Casts\Resolver\ImageResolver;

class DefaultTemplate extends BaseTemplate
{
    /**
     * Define template specific attributes.
     *
     * @param  array  $attributes
     * @return array
     */
    public function parseAttributes($attributes)
    {
        $header = array_key_exists('header_image', $attributes) ? $attributes['header_image'] : null;

        if ($header) {
            $attributes['header_image'] = ImageResolver::fromArray($header);
        }

        return array_merge(
            $attributes,
            []
        );
    }

    public function render()
    {
        return view('pages.default', [
            'page' => $this->page,
        ]);
    }
}
