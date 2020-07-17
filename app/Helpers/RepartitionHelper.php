<?php

namespace App\Helpers\RepartitionHelper;

use App\Helpers\Helper;
use App\Models\Repartition;
use Illuminate\Support\Facades\DB;

class RepartitionHelper extends Helper{


    public static function helperQueryEmployeesFromDivision($central, $division_id, $division){
        return DB::table('repartitions')
                ->join("{$division}",'repartitions.division_id','=',"{$division}.id")
                ->leftJoin('employees','repartitions.head_of_repartition_id','=','employees.id')
                ->select('repartitions.*',"{$division}.designation as division",'employees.name','employees.surname')
                ->where('repartitions.central',$central)
                ->where('repartitions.division_id', $division_id)
                ->get();
    }

    public static function helperQueryEmployeesFromCentral($central, $division){
        return DB::table('repartitions')
                ->join("{$division}",'repartitions.division_id','=',"{$division}.id")
                ->leftJoin('employees','repartitions.head_of_repartition_id','=','employees.id')
                ->select('repartitions.*',"{$division}.designation as division",'employees.name','employees.surname')
                ->where('repartitions.central',$central)
                ->get();
    }

}