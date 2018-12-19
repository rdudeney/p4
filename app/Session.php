<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function day()
    {
        # Session belongs to Day
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Day');
    }

    public function descriptions()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Description')->withTimestamps();
    }
}
