<?php

namespace App\Casts;

use App\Casts\Resolver\LinkResolver;
use Macrame\Content\ContentCast;

class EventAttributesCast extends ContentCast
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

        // For any item, we want to make sure routes are replaced with actual links
        array_walk_recursive($this->items, function (&$value) {
            $value = preg_replace_callback('/"(route:\/\/.*?)"/', function ($match) {
                return '"'.LinkResolver::urlFromLink($match[1]).'"';
            }, $value);
        });

        return [
            ...$this->items,
        ];
    }
}
