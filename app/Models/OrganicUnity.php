<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganicUnity extends Model
{
    protected $table = "organic_unities";

    public function generalManager(){
        return Employee::where("id",$this->general_manager_id)->first();      
    }

    public function deputyDirector(){
        return Employee::where("id",$this->deputy_director_id)->first();      
    }
}
