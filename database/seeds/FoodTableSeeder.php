<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $food = [
            [
                'id' => 1,
                'category_id' => 1,
                'slug' => $faker->text,
                'created_at' => Carbon::yesterday()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::yesterday()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'slug' => $faker->text,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        DB::table('foods')->insert($food);

        # id, food_id, title, locale, created_at, updated_at
        $food_translate = [
            ['id' => 1, 'food_id' => 1, 'title' => $faker->foodName(), 'locale' => 'en'],
            ['id' => 2, 'food_id' => 1, 'title' => $faker->foodName(), 'locale' => 'hr'],
            ['id' => 3, 'food_id' => 2, 'title' => $faker->foodName(), 'locale' => 'en'],
            ['id' => 4, 'food_id' => 2, 'title' => $faker->foodName(), 'locale' => 'hr']
        ];
        DB::table('food_translations')->insert($food_translate);

        DB::table('food_tag')->insert([
            [
                'food_id' => 1,
                'tag_id' => 1,
            ]
        ]);

        DB::table('food_ingredient')->insert([
            [
                'food_id' => 1,
                'ingredient_id' => 1,
            ],
            [
                'food_id' => 2,
                'ingredient_id' => 1,
            ]
        ]);
    }
}
