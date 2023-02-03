<?php

namespace Content\ImageFull;

use App\Casts\Resolver\ImageResolver;
use App\Http\Resources\ImageResource;
use App\Http\Resources\Wrapper\Image;
use Content\BaseParser;

class ImageFullParser extends BaseParser
{
    /**
     * Image.
     *
     * @var Image
     */
    public ?Image $image;

    public function parse()
    {
        $this->image = ImageResolver::fromArray($this->value['image']);
    }

    /**
     * Get the instance as an array.
     *
     * @return array<TKey, TValue>
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(), [
                'image' => $this->image
                    ? (new ImageResource($this->image))->toArray(request())
                    : null,
            ]);
    }
}
