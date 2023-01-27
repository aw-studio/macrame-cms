<?php

namespace Admin\Console\Commands;

use Admin\Console\Commands\Actions\MakeLaravelCrudFiles;
use Admin\Console\Commands\Actions\MakeVueCrudFiles;
use Illuminate\Console\Command;

class MakeCrudCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create all required files for a new CRUD';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        (new MakeLaravelCrudFiles($this->argument('name'), $this))->execute();
        (new MakeVueCrudFiles($this->argument('name'), $this))->execute();

        return Command::SUCCESS;
    }

    public function info($string, $verbosity = null)
    {
        $this->components->info($string);
    }
}
