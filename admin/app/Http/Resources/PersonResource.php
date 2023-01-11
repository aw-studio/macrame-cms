<?php

namespace Admin\Http\Resources;

use App\Models\Person;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Person
 */
class PersonResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Person
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
            'image' => $this->files('image')->first(),
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'description' => $this->description,
        ];
    }
}
