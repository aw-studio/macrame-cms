<?php

namespace App\Templates;

use Admin\Contracts\Pages\Page;
use App\Contracts\PageTemplateContract;
use Illuminate\Support\Str;

abstract class BaseTemplate implements PageTemplateContract
{
    public function __construct(public Page $page)
    {
    }

    public function load()
    {
    }

    public function toArray()
    {
        return [];
    }

    /**
     * Define template specific attributes.
     *
     * @param  array  $attributes
     * @return array
     */
    public function parseAttributes($attributes)
    {
        return $attributes;
    }

    /**
     * Return the template name when the
     * class is accessed as a string.
     */
    public function __toString()
    {
        if (isset($this->templateName)) {
            return $this->tempplateName;
        }

        return $this->guessTemplateName();
    }

    protected function guessTemplateName(): string
    {
        $className = class_basename($this);

        if (! Str::endsWith($className, 'Template')) {
            return $className;
        }

        return Str::of($className)->replaceLast('Template', '')->lcfirst();
    }
}
