<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'name' => 'Startseite',
            'slug' => null,
            'order_column' => '0',
            'publish_at' => now(),
            'is_live' => true,
            'creator_id' => 1,
            'template' => 'home',
            'preview_key' => '08913214-9805-49b2-ae75-29e0d66cf390',
            'attributes' => [
                'h1' => 'Startseite',
                'intro_text' => [
                    'content_wide' => false,
                    'text' => '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>',
                ],
            ],
        ]);
        Page::create([
            'name' => 'Beiträge',
            'slug' => 'meldungen',
            'order_column' => '0',
            'publish_at' => now(),
            'is_live' => true,
            'creator_id' => 1,
            'template' => 'posts',
            'preview_key' => 'd183acef-1326-4764-8dc6-ceaa4446cbcf',
            'attributes' => [
                'h1' => 'Beiträge',
            ],
        ]);
        Page::create([
            'name' => 'Datenschutz',
            'slug' => 'datenschutz',
            'order_column' => '0',
            'publish_at' => now(),
            'is_live' => true,
            'creator_id' => 1,
            'template' => 'default',
            'preview_key' => '323d2518-868c-4d1e-a8f3-3a68ebaa4477',
            'attributes' => [
                'h1' => 'Datenschutz',
            ],
            'content' => [
                [
                    'type' => 'text_full',
                    'value' => [
                        'content_wide' => false,
                        'text' => '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>',
                    ],
                ],
            ],
        ]);
        Page::create([
            'name' => 'Impressum',
            'slug' => 'impressum',
            'order_column' => '0',
            'publish_at' => now(),
            'is_live' => true,
            'creator_id' => 1,
            'template' => 'default',
            'preview_key' => '323d2518-868c-4d1e-a8f3-3a68ebaa4477',
            'attributes' => [
                'h1' => 'Impressum',
            ],
            'content' => [
                [
                    'type' => 'text_full',
                    'value' => [
                        'content_wide' => false,
                        'text' => '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>',
                    ],
                ],
            ],
        ]);
        Page::create([
            'name' => 'Veranstaltungen',
            'slug' => 'veranstaltungen',
            'order_column' => '0',
            'publish_at' => now(),
            'is_live' => true,
            'creator_id' => 1,
            'template' => 'events',
            'preview_key' => 'd183acef-1326-4764-8dc6-ceaa4446asvx',
            'attributes' => [
                'h1' => 'Veranstaltungen',
            ],
        ]);
        Page::create([
            'name' => 'Kontakt',
            'slug' => 'kontakt',
            'order_column' => '0',
            'publish_at' => now(),
            'is_live' => true,
            'creator_id' => 1,
            'template' => 'contact',
            'preview_key' => 'd183acef-1326-4764-8dc6-ceaa4446dfht',
            'attributes' => [
                'h1' => 'Kontakt',
            ],
        ]);
    }
}
