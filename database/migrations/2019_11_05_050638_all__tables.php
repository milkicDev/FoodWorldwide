<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });

        Schema::create('category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // Tags
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });

        Schema::create('tag_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

        // Tags
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });

        Schema::create('ingredient_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();

            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });

        // Foods
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::create('food_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();

            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });

        // Tag & ingredient
        Schema::create('food_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });

        Schema::create('food_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();

            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
        Schema::dropIfExists('food_translations');

        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_translations');

        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('ingredient_translations');
    }
}
