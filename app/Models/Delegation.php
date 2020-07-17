<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Delegation extends Model
{
    public function deputy(){
        $deputy = Employee::where('id',$this->deputy_id)->first();
        return (isset($deputy)) ? $deputy->name . " " . $deputy->surname : "";
    }
}
