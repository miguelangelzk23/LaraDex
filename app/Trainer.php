<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
   // @return
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
