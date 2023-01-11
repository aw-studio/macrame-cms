<?php

namespace Admin\Http\Resources;

use AwStudio\Redirects\Models\Redirect;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Redirect
 */
class RedirectResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var Redirect
     */
    public $resource;

    /**
     * Gets the value array containing all required attributes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function value($request)
    {
        return parent::toArray($request);
    }
}
