<?php

namespace Content;

use Macrame\Content\Contracts\Parser;

abstract class BaseParser implements Parser
{
    public function __construct(
        protected array $value
    ) {
        //
    }

    /**
     * Get the parser instance as an array.
     *
     * @return array<TKey, TValue>
     */
    public function toArray()
    {
        $array = [];

        foreach ($this->getProperties() as $property) {
            $name = $property->getName();
            $value = $this->{$name};

            $array[$name] = $value;
        }

        return array_merge(
            $this->value,
            $array
        );
    }

    protected function getProperties()
    {
        return (new \ReflectionObject($this))
                ->getProperties(\ReflectionProperty::IS_PUBLIC);
    }
}
