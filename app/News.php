<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title'
        , 'authors'
        , 'content'
        , 'categories'
        , 'tags'
        , 'thumbnail'
    ];

    protected $hidden = [
        'meta-desc'
        , 'meta-robot'
        , 'slug'
        , 'description'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];

    protected $dates = [
        'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];
}
