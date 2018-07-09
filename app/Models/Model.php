<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as baseModel;

class Model extends baseModel
{
    //
    public function scopeRecent($query)
    {
        return $query->latest('id');
    }

    public function scopeOrdered($query)
    {
        return $query->latest('order');
    }
}
