<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function employees(){
        return $this->belongsToMany(Employee::class);
    }
}
