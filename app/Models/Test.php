<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
