<?php

namespace Echoamirali\Slugger\Tests;

use Illuminate\Database\Eloquent\Model;
use Echoamirali\Slugger\Traits\Slugger;

class Article extends Model {

    use Slugger;

    protected $table = 'articles';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug'
    ];

}