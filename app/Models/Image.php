<?php

namespace App\Models;


class Image extends Model
{
    //
    protected $fillable = [
        'type',
        'path'
    ];

    public function belongsToUser()
    {
        return $this->belongsTo(User::class);
    }
}
