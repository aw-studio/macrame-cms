<?php

namespace Content\InfoBox;

use App\Casts\Resolvers\LinkResolver;
use Content\BaseParser;

class InfoBoxParser extends BaseParser
{
    public function parse()
    {
        $link = $this->value['link'] ?? ['link' => ''];
        $link['url'] = LinkResolver::urlFromLink($link['url'] ?? '');

        $this->value['link'] = $link;
    }
}
