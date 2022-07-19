<?php

namespace Echoamirali\Slugger\Tests;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $table = 'articles';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug'
    ];

}