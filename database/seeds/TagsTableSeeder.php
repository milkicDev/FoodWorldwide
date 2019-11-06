<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'id' => 1,
            'slug' => '',
        ]);

        # id, food_id, title, locale, created_at, updated_at
        $tag_translations = [
            ['id' => 1, 'tag_id' => 1, 'title' => 'Fruit', 'locale' => 'en'],
            ['id' => 2, 'tag_id' => 1, 'title' => 'Voce', 'locale' => 'hr']
        ];
        DB::table('tag_translations')->insert($tag_translations);
    }
}
