<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'id' => 1,
            'category_id' => 1,
            'tags' => 1,
            'ingredients' => 1,
            'slug' => '',
        ]);

        # id, food_id, title, locale, created_at, updated_at
        $food_translate = [
            ['id' => 1, 'food_id' => 1, 'title' => 'Apple Pie', 'locale' => 'en'],
            ['id' => 2, 'food_id' => 1, 'title' => 'Apple Pie', 'locale' => 'hr']
        ];
        DB::table('food_translations')->insert($food_translate);
    }
}
