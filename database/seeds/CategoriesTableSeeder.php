<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'slug' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        # id, food_id, title, locale, created_at, updated_at
        $category_translate = [
            ['id' => 1, 'category_id' => 1, 'title' => 'Bun', 'locale' => 'en'],
            ['id' => 2, 'category_id' => 1, 'title' => 'Peciva', 'locale' => 'hr']
        ];
        DB::table('category_translations')->insert($category_translate);
    }
}
