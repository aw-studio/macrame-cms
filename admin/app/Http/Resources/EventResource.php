<?php

namespace Admin\Http\Resources;

use App\Models\Menu;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Menu
 */
class EventResource extends JsonResource
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
     * @param  \Illuminate\Http\Request                                        $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'attributes' => $this->attributes->toArray(),
            'starts_at'  => $this->starts_at ? new DateTimeResource($this->starts_at) : [
                'original'      => null,
                'formatted'     => null,
                'label'         => null,
                'readable_diff' => null,
            ],
            'ends_at' => $this->ends_at ? new DateTimeResource($this->ends_at) : [
                'original'      => null,
                'formatted'     => null,
                'label'         => null,
                'readable_diff' => null,
            ],
        ];
    }
}
