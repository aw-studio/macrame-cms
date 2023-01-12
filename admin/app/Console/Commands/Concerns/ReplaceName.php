<?php

namespace Admin\Console\Commands\Concerns;

trait ReplaceName
{
    /**
     * Replace the name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceName($content, $name)
    {
        $name = strtolower($name);

        return str_replace(['{{Name}}', '{{name}}'], [
            ucfirst($name),
            lcfirst($name),
        ], $content);
    }
}
