<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Delegation;
use App\Models\Department;

/**
 * 
 * @company National Institute Of Social Protection
 * @author Walter Sono
 * @email tec.waltersono@gmail.com
 */
class Repartition extends Model
{
    public function department(){
        return $this->belongsTo(Department::class,"division_id");
    }

    public function delegation(){
        return $this->belongsTo(Delegation::class,"division_id");
    }

    public function division(){
        if($this->central == 1){
            return $this->belongsTo(Department::class,"division_id");
        }elseif($this->central == 0){
            return $this->belongsTo(Delegation::class,"division_id");
        }
        return NULL;
    }
}
