<?php

namespace Admin\Console\Commands\Actions;

use Admin\Console\Commands\Concerns\ReplaceName;
use Admin\Console\Commands\MakeCrudCommand;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class MakeLaravelCrudFiles
{
    use ReplaceName;

    protected $name;

    protected $stubPath = 'admin/app/Console/stubs/crud/php/';

    public function __construct(string $name, protected MakeCrudCommand $command)
    {
        $this->name = $name = strtolower($name);
    }

    public function execute()
    {
        $this->ensureBasicLaravelFilesExist();

        $files = [
            'controlller.php.stub' => [
                'path' => 'Http/Controllers/',
                'name' => ucfirst($this->name).'Controller.php',
            ],
            'index.php.stub' => [
                'path' => 'Http/Indexes/',
                'name' => ucfirst($this->name).'Index.php',
            ],
            'resource.php.stub' => [
                'path' => 'Http/Resources/',
                'name' => ucfirst($this->name).'Resource.php',
            ],
        ];

        foreach ($files as $stub => $file) {
            $targetPath = base_path('admin/app/'.$file['path'].$file['name']);

            if (File::exists($targetPath)) {
                $this->command->error('File already exists at '.$targetPath);

                continue;
            }

            File::ensureDirectoryExists(base_path('admin/app/'.$file['path']));

            $stubPath = base_path($this->stubPath.$stub);

            $content = $this->replaceName(File::get($stubPath), $this->name);

            File::put($targetPath, $content);

            $this->command->info(str_replace('.php', '', $file['name']).' [admin/app/'.$file['path'].$file['name'].'] created successfully.');
        }

        $this->registerRoutes();
    }

       protected function registerRoutes()
       {
           $adminRoutes = File::get(base_path('/admin/routes/api.php'));

           $controllerClassName = 'Admin\\Http\\Controllers\\'.ucfirst($this->name).'Controller';

           // add controller use statement as the last import
           if (! Str::contains($adminRoutes, $controllerClassName)) {
               preg_match_all('/use .*?;/', $adminRoutes, $matches);
               $lastMatch = $matches[0][count($matches[0]) - 1];
               $newRouteImport = "use $controllerClassName;";
               $adminRoutes = Str::replace($lastMatch, $lastMatch."\n$newRouteImport", $adminRoutes);
           } else {
               $this->command->error('Controller Namespace already imported');
           }

           // Add route resource below last Route declaration withtin the admin/api prefixed group
           if (! Str::contains($adminRoutes, "Route::resource('{$this->name}s'")) {
               $adminRoutes = preg_replace_callback('/\'admin\/api\',\s+?\],\s+?function\s+?\(\)\s+?\{((?:.*?|\n)*?)\s+?\}\)\;/', function ($matches) {
                   return Str::replaceLast(");\n", ");\n\n    //{$this->name}s\n    Route::resource('".$this->name."s', ".ucfirst($this->name)."Controller::class);\n", $matches[0]);
               }, $adminRoutes);
           } else {
               $this->command->error("{$this->name}s routes already registered");
           }

           File::put(base_path('/admin/routes/api.php'), $adminRoutes);
       }

    public function ensureBasicLaravelFilesExist()
    {
        // Create Laravel App Model Files if not already existing
        if (! File::exists(app_path('/Models/'.ucfirst($this->name).'.php'))) {
            Artisan::call('make:model', [
                'name' => ucfirst($this->name),
                '-m' => true,
            ], $this->command->getOutput());
        }

        if (! File::exists(app_path('/Http/Resources/'.ucfirst($this->name).'Resource.php'))) {
            Artisan::call('make:resource', [
                'name' => ucfirst($this->name),
            ], $this->command->getOutput());
        }

        if (! File::exists(app_path('/Http/Controllers/'.ucfirst($this->name).'Controller.php'))) {
            Artisan::call('make:controller', [
                'name' => ucfirst($this->name),
            ], $this->command->getOutput());
        }
    }
}
