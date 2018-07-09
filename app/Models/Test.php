<?php

namespace App\Models;


class Test extends Model
{
    //
    public $table = 'test';

    public $fillable = [
        'username',
        'created_at',
        'updated_at'
    ];
}
