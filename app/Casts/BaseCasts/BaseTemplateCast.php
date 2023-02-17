<?php

namespace App\Casts\BaseCasts;

use App\Templates\BaseTemplate;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\File;

abstract class BaseTemplateCast implements CastsAttributes
{
    protected $templates = [];

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return $this->getTemplateInstance($value, $model);
    }

    public function getTemplateInstance($template, $model)
    {
        if (! array_key_exists($template, $this->templates)) {
            return new $this->templates['default']($model);
        }

        return new $this->templates[$template]($model);
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
            return $value->__toString();
        }

        return $value;
    }

    public function getTemplates()
    {
        if (count($this->templates) > 0) {
            return $this->templates;
        }

        return $this->getTemplatesFromNamespace();
    }

    protected function getTemplatesFromNamespace()
    {
        $templates = collect(File::allFiles(app_path('Templates')))
              ->map(function ($item) {
                  $path = $item->getRelativePathName();
                  $class = sprintf('\%s%s',
                      'App\Templates\\',
                      strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                  return $class;
              })
              ->filter(function ($class) {
                  $valid = false;

                  if (class_exists($class)) {
                      $reflection = new \ReflectionClass($class);

                      $valid = $reflection->isSubclassOf(BaseTemplate::class) &&
                          ! $reflection->isAbstract();
                  }

                  return $valid;
              });

        return $templates;
    }

    /**
     * Get the instance as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->template;
    }
}
