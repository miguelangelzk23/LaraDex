<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['nombre','avatar'];

    //
   // @return
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
