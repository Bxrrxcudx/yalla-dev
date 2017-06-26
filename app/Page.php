<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = [
        'title'
        , 'description'
        , 'content'
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
