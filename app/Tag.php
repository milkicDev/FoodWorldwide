<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];
    public $translationForeignKey = 'tag_id';

    public $localeKey;
    public $fillable = ['title'];
}
