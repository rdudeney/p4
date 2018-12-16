<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    public function sessions()
    {
        return $this->belongsToMany('App\Session')->withTimestamps();
    }
}
