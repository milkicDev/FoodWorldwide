<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Food extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'food_id'];

    public $localeKey;
    public $fillable = ['title', 'food_id', 'category_id'];

    public function category() {
		return $this->belongsTo(Category::class);
    }

    // public function tag() {
    //     return $this->hasMany(Tag::class, 'id');
    // }
}
