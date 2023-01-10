<?php

namespace Database\Seeders;

use App\Models\Partial;
use Illuminate\Database\Seeder;

class PartialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partial::create([
            'name'       => 'Header',
            'template'   => 'header',
            'attributes' => [
                'logo' => [
                    'id' => 1,
                ],
            ],
        ]);
        Partial::create([
            'name'       => 'Footer',
            'template'   => 'footer',
            'attributes' => [
                'email' => 'test@test.com',
                'phone' => '123456789',
            ],
        ]);
    }
}
