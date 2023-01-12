<?php

namespace Admin\Console\Commands\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Admin\Console\Commands\Concerns\ReplaceName;

class MakeVueCrudFiles
{
    use ReplaceName;

    protected $appDirectory = '/admin/resources/app/';

    protected $name;

    protected $stubPath = 'admin/app/Console/stubs/crud/js/';

    public function __construct(string $name, protected $command)
    {
        $this->name = $name = strtolower($name);
    }

    public function execute()
    {
        $files = [
            'crud.api.ts.stub' => [
                'path' => 'entities/' . $this->name . '/',
                'name' => 'api.ts',
            ],
            'crud.form.ts.stub' => [
                'path' => 'entities/' . $this->name . '/',
                'name' => $this->name . '.form.ts',
            ],
            'crud.index.ts.stub' => [
                'path' => 'entities/' . $this->name . '/',
                'name' => $this->name . '.index.ts',
            ],
            'crud.types.ts.stub' => [
                'path' => 'entities/' . $this->name . '/',
                'name' => 'types.ts',
            ],
            'routes.ts.stub' => [
                'path' => 'Pages/' . $this->name . '/',
                'name' => 'routes.ts',
            ],
            'CrudIndex.vue.stub' => [
                'path' => 'Pages/' . $this->name . '/',
                'name' => 'Index.vue',
            ],
            'CrudShow.vue.stub' => [
                'path' => 'Pages/' . $this->name . '/',
                'name' => 'Show.vue',
            ],
            'CrudCreateModal.vue.stub' => [
                'path' => 'Pages/' . $this->name . '/components/',
                'name' => 'Add' . ucfirst($this->name) . 'Modal.vue',
            ],
        ];

        foreach ($files as $stub => $file) {
            $targetPath = $this->appPath($file['path'] . $file['name']);

            if (File::exists($targetPath)) {
                $this->command->error('File already exists at ' . $targetPath);
                continue;
            }

            File::ensureDirectoryExists($this->appPath($file['path']));

            $stubPath = base_path($this->stubPath . $stub);

            $content = $this->replaceName(File::get($stubPath), $this->name);

            File::put($targetPath, $content);

            $this->command->info('['.$this->appDirectory.$file['path'].$file['name'].'] created successfully.');

            if (Str::contains($file['path'], 'entities')) {
                $this->registerEntityFile($file);
            }
        }

        $this->registerRoutes();
    }

    protected function registerEntityFile($file)
    {
        $entitiesIndexPath = $this->appPath('entities/index.ts');
        $entitiesIndexContent = File::get($entitiesIndexPath);

        $fileExportName = Str::replace(['.vue', '.ts'], '', $file['name']);
        $exportStatement = "export * from './$this->name/$fileExportName';";

        if (! Str::contains($entitiesIndexContent, "// $this->name")) {
            $entitiesIndexContent = $entitiesIndexContent . "\n\n// $this->name";
        }

        if (! Str::contains($entitiesIndexContent, $exportStatement)) {
            $entitiesIndexContent = $entitiesIndexContent . "\n$exportStatement";
        }

        File::put($entitiesIndexPath, $entitiesIndexContent);

    }

    protected function registerRoutes()
    {
        $newRouteImport = 'import { routes as ' . lcfirst($this->name) . "Routes } from '@/pages/$this->name/routes';";

        $routerPath = $this->appPath('plugins/router.ts');

        $routerContent = File::get($routerPath);

        // add import statement
        if (! Str::contains($routerContent, $newRouteImport)) {
            preg_match_all("/import.*?\/routes';\n/", $routerContent, $matches);
            $lastMatch = $matches[0][count($matches[0]) - 1];
            $routerContent = Str::replace($lastMatch, $lastMatch . "$newRouteImport\n\n", $routerContent);
        } else {
            $this->command->error('Route Import already exists');
        }

        // spread routes to base routes children
        if (! Str::contains($routerContent, "...{$this->name}Routes,\n")) {
            $routerContent = preg_replace_callback('/children:\s?\[((?:.*?|\n)*?)\]/', function ($matches) {
                return Str::replaceLast("Routes,\n", "Routes,\n            ...{$this->name}Routes,\n", $matches[0]);
            }, $routerContent);
        } else {
            $this->command->error("{$this->name}Routes are already registered");
        }

        File::put($routerPath, $routerContent);

        $this->command->info(lcfirst($this->name) . 'Routes successfully registered  in '.$this->appDirectory . 'plugins/router.ts');

    }

    protected function appPath(string $path)
    {
        return base_path($this->appDirectory.ltrim($path));
    }

}
