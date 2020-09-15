<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('news')->insert($this->getData());
        factory(News::class, 5)->create();
    }

//    private function getData(): array
//    {
//        $data = [];
//
//        $faker = Faker\Factory::create('ru_RU');
//
//        for ($i=0; $i<5;$i++) {
//            $data[] = [
//                'title' => $faker->realText(rand(10, 30)),
//                'text' => $faker->realText(rand(1000, 3000)),
//                // 'category_id' => $faker->numberBetween(1,2),
//                'isPrivate' => false
//            ];
//        }
//
//        return $data;
//    }
}
