<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'id' => 1,
            'slug' => '',
        ]);

        # id, food_id, title, locale, created_at, updated_at
        $ingredient_translations = [
            ['id' => 1, 'ingredient_id' => 1, 'title' => 'Apples', 'locale' => 'en'],
            ['id' => 2, 'ingredient_id' => 1, 'title' => 'Jabuke', 'locale' => 'hr']
        ];
        DB::table('ingredient_translations')->insert($ingredient_translations);
    }
}
