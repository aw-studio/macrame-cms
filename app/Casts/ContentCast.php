<?php

namespace App\Casts;

use App\Casts\Resolver\LinkResolver;
use Content\Block\BlockParser;
use Content\Cards\CardsParser;
use Content\CTA\CTAParser;
use Content\Downloads\DownloadsParser;
use Content\GridGallery\GridGalleryParser;
use Content\ImageCarousel\CarouselParser;
use Content\ImageFull\ImageFullParser;
use Content\InfoBox\InfoBoxParser;
use Content\LogoWall\LogoWallParser;
use Content\Map\MapParser;
use Content\TeaserBoxes\TeaserBoxesParser;
use Content\TextImage\TextImageParser;

class ContentCast extends BaseContentCast
{
    /**
     * List of parsers.
     *
     * @var array
     */
    protected $parsers = [
        'block' => BlockParser::class,
        'image_small' => ImageFullParser::class,
        'image_full' => ImageFullParser::class,
        'text_image' => TextImageParser::class,
        'info_section' => TextImageParser::class,
        'logo_wall' => LogoWallParser::class,
        'image_carousel' => CarouselParser::class,
        'teaser_boxes' => TeaserBoxesParser::class,
        'cta' => CTAParser::class,
        'map' => MapParser::class,
        'info_box' => InfoBoxParser::class,
        'cards' => CardsParser::class,
        'downloads' => DownloadsParser::class,
        'grid_gallery' => GridGalleryParser::class,
    ];

    /**
     * Parse items.
     *
     * @return $this
     */
    public function parse()
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key] = $this->parseItem($item);
        }

        // For any item, we want to make sure routes are replaced with actual links
        array_walk_recursive($this->items, function (&$value, $key) {
            if ((! is_array($value) && ! is_string($value)) || $key == 'items') {
                return;
            }

            $value = preg_replace_callback('/"(route:\/\/.*?)"/', function ($match) {
                return '"'.LinkResolver::urlFromLink($match[1]).'"';
            }, $value);
        });

        return $this;
    }

    /**
     * Parse a single item.
     *
     * @param  array  $item
     * @return array $item
     */
    protected function parseItem($item)
    {
        if (! array_key_exists('type', $item) || ! array_key_exists('value', $item)) {
            return $item;
        }

        if (! is_array($item['value'])) {
            return $item;
        }

        $item['value'] = $this->parseItemValue(
            $item['value'],
            $this->parsers[$item['type']] ?? null,
        );

        return $item;
    }

    /**
     * Parse item value.
     *
     * @param  array  $value
     * @param  string|null  $parser
     * @param  bool  $toArray
     * @return
     */
    protected function parseItemValue(array $value, ?string $parser)
    {
        if (is_null($parser)) {
            return $value;
        }

        $p = new $parser($value);
        $p->parse();

        return $p->toArray();
    }

}
