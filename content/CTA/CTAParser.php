<?php

namespace Content\CTA;

use App\Casts\Resolver\LinkResolver;
use Content\BaseParser;

class CTAParser extends BaseParser
{
    public function parse()
    {
        $link = $this->value['link'] ?? ['link' => ''];
        $link['url'] = LinkResolver::urlFromLink($link['url'] ?? '');
        $this->value['link'] = $link;
    }
}
