<?php

namespace Admin\Http\Resources;

use App\Models\Menu;
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
        return [
            'id' => $this->id,
            'attributes' => $this->attributes->toArray(),
            'content' => $this->content->toArray(),
            'image' => $this->files('image')->first(),
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name,
            ],
            'publish_at' => $this->publish_at ? new DateTimeResource($this->publish_at) : [
                'original' => null,
                'formatted' => null,
                'label' => null,
                'readable_diff' => null,
            ],
            'unpublish_at' => $this->unpublish_at ? new DateTimeResource($this->unpublish_at) : [
                'original' => null,
                'formatted' => null,
                'label' => null,
                'readable_diff' => null,
            ],
            'feature_until' => $this->feature_until ? new DateTimeResource($this->feature_until) : [
                'original' => null,
                'formatted' => null,
                'label' => null,
                'readable_diff' => null,
            ],
            'is_featured' => $this->feature_until ? $this->feature_until >= now() : false,
            'is_pinned' => $this->is_pinned,
        ];
    }
}
