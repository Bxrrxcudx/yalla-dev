<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $table = 'messages';

    //protected $timestamps = false;

    protected $fillable = [
        'last_name'
        , 'first_name'
        , 'mail'
        , 'subject'
        , 'message'
    ];

    protected $hidden = [
        'sent_date'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];

    protected $dates = [
        'sent_date'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'
    ];
}
