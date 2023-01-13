<?php

namespace Admin\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeTemplateCommand extends Command
{
    use Concerns\ReplaceName;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:template {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new template';

    /**
     * The path to the stubs.
     */
    protected $stubPath = 'admin/app/Console/stubs/template/';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        $files = [
            'template.blade.php.stub' => [
                'path' => 'resources/views/pages/',
                'name' => Str::kebab($name).'.blade.php',
            ],
            'TemplateLoader.php.stub' => [
                'path' => 'app/Casts/Loaders/',
                'name' => Str::ucfirst($name).'TemplateLoader.php',
            ],
        ];

        foreach ($files as $stub => $file) {
            $targetPath = base_path($file['path'].$file['name']);

            if (File::exists($targetPath)) {
                $this->error('File already exists at '.$targetPath);

                continue;
            }

            File::ensureDirectoryExists(base_path($file['path']));

            $stubPath = base_path($this->stubPath.$stub);

            $content = $this->replaceName(File::get($stubPath), $this->argument('name'));

            File::put($targetPath, $content);

            $this->info('Created '.$file['name'].' in '.$file['path']);
        }

        return Command::SUCCESS;
    }
}
