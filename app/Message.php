<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

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
    ];
}
