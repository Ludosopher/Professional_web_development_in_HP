<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            'title' => 'Яндекс. Космос', // 'Лента',
            'link' => 'https://news.yandex.ru/cosmos.rss', // 'https://lenta.ru/rss',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
