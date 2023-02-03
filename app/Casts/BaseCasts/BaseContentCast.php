<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Macrame\Content\Contracts\Parser;

abstract class BaseContentCast implements CastsAttributes, Arrayable, Jsonable
{
    public array $rawItems;

    /**
     * Parse items.
     *
     * @param  array  $items
     * @return $this
     */
    abstract public function parse();

    /**
     * Create new PageContent instance.
     *
     * @param  array  $data
     */
    public function __construct(
        protected ?Model $model = null,
        protected array $items = []
    ) {
        $this->rawItems = $items;
        //
    }

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return statics
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $items = json_decode($value, true);
        $cast = (new static($model, $items));

        return $cast->parse();
    }

    /**
     * Get the items.
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Get array from resource and model.
     *
     * @param  string  $resource
     * @param  Model  $model
     * @return array
     */
    protected function resourceArray($resource, $model)
    {
        return (new $resource($model))->toArray(request());
    }

    /**
     * Get array from resource and model.
     *
     * @param  string  $resource
     * @param  Model  $model
     * @return array
     */
    protected function resourceCollectionArray($resource, $model)
    {
        return $resource::collection()->toArray(request());
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if ($value instanceof $this) {
            return $value->toJson();
        }

        return json_encode($value, 0);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray($raw = false)
    {
        $items = $raw ? $this->rawItems : $this->items;

        if (empty($items)) {
            return new \stdClass;
        }

        foreach ($items as $key => $item) {
            if ($item instanceof Parser) {
                $items[$key] = $item->toArray();
            } elseif (! is_array($item)) {
                continue;
            } elseif (! array_key_exists('value', $item)) {
                continue;
            } elseif ($item['value'] instanceof Parser) {
                $repArray = $item['value']->toArray();

                foreach ($repArray as $repArrayKey => $value) {
                    if ($value instanceof JsonResource || $value instanceof ResourceCollection) {
                        $repArray[$repArrayKey] = $value->toArray(request());
                    }
                }

                $iems[$key]['value'] = $repArray;
            }
        }

        return $items;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->rawItems, $options);
    }

    public function __get($key)
    {
        if (! array_key_exists($key, $this->items)) {
            return null;
        }

        return $this->items[$key];
    }
}
