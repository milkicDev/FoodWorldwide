<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];
    public $translationForeignKey = 'category_id';

    public $localeKey;
    public $fillable = ['title'];
}
