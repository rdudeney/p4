<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    public function sessions()
    {
        return $this->belongsToMany('App\Session')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $descriptions = self::orderBy('type')->get();
        $descriptionsForCheckboxes = [];

        foreach ($descriptions as $description)
        {
            $descriptionsForCheckboxes[$description['id']] = $description->type;
        }
        return $descriptionsForCheckboxes;
    }
}
