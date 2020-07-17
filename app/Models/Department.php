<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repartition;
use App\Models\Employee;

class Department extends Model
{
    public function repartitions(){
        return $this->hasMany(Repartition::class);
    }

    public function headOfDepartment(){
        return Employee::where("id",$this->head_of_department_id)->first();      
    }


}
