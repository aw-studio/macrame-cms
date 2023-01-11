<?php

namespace App\Http\Resources;

use Admin\Http\Resources\DateTimeResource;
use App\Models\Event;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Event
 */
class EventResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Event
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
                'name' => $this->name,
                'fullslug' => $this->getFullSlug(),
                'starts_at' => $this->starts_at ? DateTimeResource::make($this->starts_at)->toArray($request) : null,
                'ends_at' => $this->ends_at ? DateTimeResource::make($this->ends_at)->toArray($request) : null,
            ],
            $this->attributes->parse()
        );
    }
}
