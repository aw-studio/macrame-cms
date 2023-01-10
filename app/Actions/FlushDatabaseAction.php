<?php

namespace App\Actions;

use Illuminate\Support\Facades\Artisan;

class FlushDatabaseAction
{
    public function execute()
    {
        Artisan::call('migrate:fresh', [
            '--seed'  => true,
            '--force' => true,
        ]);
        Artisan::call('cache:clear');
    }
}
