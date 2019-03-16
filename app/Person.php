<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    public function addresses()
    {
        return $this->hasMany('App\Address','person_id');
    }
}
