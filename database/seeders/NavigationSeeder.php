<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::create([
            'title'        => 'Startseite',
            'link'         => 'route://site.1',
            'order_column' => '0',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 1,
            'parent_id'    => null,
        ]);
        MenuItem::create([
            'title'        => 'Meldungen',
            'link'         => 'route://site.2',
            'order_column' => '1',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 1,
            'parent_id'    => 6,
        ]);
        MenuItem::create([
            'title'        => 'Veranstaltungen',
            'link'         => 'route://site.5',
            'order_column' => '0',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 1,
            'parent_id'    => 6,
        ]);
        MenuItem::create([
            'title'        => 'Datenschutz',
            'link'         => 'route://site.3',
            'order_column' => '0',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 2,
            'parent_id'    => null,
        ]);
        MenuItem::create([
            'title'        => 'Impressum',
            'link'         => 'route://site.4',
            'order_column' => '0',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 2,
            'parent_id'    => null,
        ]);
        MenuItem::create([
            'title'        => 'Aktuelles',
            'link'         => null,
            'order_column' => '1',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 1,
            'parent_id'    => null,
        ]);
        MenuItem::create([
            'title'        => 'Kontakt',
            'link'         => 'route://site.6',
            'order_column' => '0',
            'new_tab'      => null,
            'is_group'     => false,
            'menu_id'      => 1,
            'parent_id'    => null,
        ]);
    }
}
