<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function sessions()
    {
        # Day has many Sessions
        # Define a one-to-many relationship.
        return $this->hasMany('App\Session');
    }
}
