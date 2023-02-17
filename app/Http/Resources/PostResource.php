<?php

namespace App\Http\Resources;

use Admin\Http\Resources\DateTimeResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Menu
 */
class PostResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Menu
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(
            [
                'id' => $this->id,
                'slug' => $this->slug,
                'publish_at' => DateTimeResource::make($this->publish_at)->toArray($request),
                'fullslug' => $this->getFullSlug(),
                'content' => $this->content->parse(),
            ],
            $this->attributes->parse()
        );
    }
}
