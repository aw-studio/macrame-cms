<?php

namespace Admin\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeContentCommand extends Command
{
    use Concerns\ReplaceName;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:content {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new content section';

    /**
     * The path to the stubs.
     */
    protected $stubPath = 'admin/app/Console/stubs/content/';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        $files = [
            'Section.vue.stub' => [
                'path' => ucfirst($name).'/components/',
                'name' => 'Section'.ucfirst($name).'.vue',
            ],
            'SectionDrawer.vue.stub' => [
                'path' => ucfirst($name).'/components/',
                'name' => 'Drawer'.ucfirst($name).'.vue',
            ],
            'SectionForm.vue.stub' => [
                'path' => ucfirst($name).'/components/',
                'name' => 'Section'.ucfirst($name).'Form.vue',
            ],
            'Parser.php.stub' => [
                'path' => ucfirst($name).'/',
                'name' => ucfirst($name).'Parser.php',
            ],
        ];

        foreach ($files as $stub => $file) {
            $targetPath = base_path('content/'.$file['path'].$file['name']);

            if (File::exists($targetPath)) {
                $this->error('File already exists at '.$targetPath);

                continue;
            }

            File::ensureDirectoryExists(base_path('content/'.$file['path']));

            $stubPath = base_path($this->stubPath.$stub);

            $content = $this->replaceName(File::get($stubPath), $this->argument('name'));

            File::put($targetPath, $content);

            $this->info('Created '.$file['name'].' in content/'.$file['path']);
        }

        $this->warn('The new content section is not yet registered in the app. You need to add it to the content section in the app.');

        return Command::SUCCESS;
    }
}
