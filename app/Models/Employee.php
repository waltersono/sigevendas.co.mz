<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

}
