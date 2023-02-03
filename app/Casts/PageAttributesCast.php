<?php

namespace App\Casts;

use Admin\Contracts\Pages\Page;
use App\Casts\Resolver\LinkResolver;
use App\Models\File;

class PageAttributesCast extends BaseContentCast
{
    /**
     * Parse items.
     *
     * @param  array  $items
     * @return $this
     */
    public function parse()
    {
        $this->parseDefaultAttributes();

        if ($this->model instanceof Page) {
            $this->items = $this->model->template->parseAttributes($this->items);
        }

        return $this;
    }

    /**
     * Check the attributes json content for some default items
     * that might be included in every page
     */
    public function parseDefaultAttributes()
    {
        // og image
        // where ID is null will trigger da db query
        $og_image = File::query()
            ->where('id', $this->items['meta_og_image']['id'] ?? null)
            ->first();
        $this->items['meta_og_image_url'] = $og_image ? $og_image->getUrl() : null;

        // For any item, we want to make sure routes are replaced with actual links
        array_walk_recursive($this->items, function (&$value, $key) {
            if (! is_array($value) && ! is_string($value) || $key == 'items') {
                return;
            }

            // ray($value);
            $value = preg_replace_callback('/"(route:\/\/.*?)"/', function ($match) {
                return '"'.LinkResolver::urlFromLink($match[1]).'"';
            }, $value);
        });

        return $this;
    }

}
