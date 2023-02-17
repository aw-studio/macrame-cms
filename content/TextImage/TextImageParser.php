<?php

namespace Content\TextImage;

use App\Casts\Resolver\ImageResolver;
use App\Casts\Resolver\LinkResolver;
use Content\BaseParser;

class TextImageParser extends BaseParser
{
    public function parse()
    {
        $this->value['image'] = ImageResolver::fromArray($this->value['image']);

        $link = $this->value['link'] ?? ['link' => ''];

        $link['url'] = LinkResolver::urlFromLink($link['url'] ?? '');
        $this->value['link'] = $link;
        // dd($this->value);
    }
}
