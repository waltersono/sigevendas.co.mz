<?php

namespace App\Helpers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Report;

class ReportHelper extends Helper{

    public static function queryAcademicLevelInformation($central, $divisionId, $repartitionId){
        return DB::table('employees')
        ->leftJoin('delegations','employees.id','=','delegations.deputy_id')
        ->leftJoin('repartitions','employees.repartition_id','=','repartitions.id')
        ->leftJoin('trainings','employees.id','=','trainings.employee_id')
        ->leftJoin('courses','trainings.course_id','=','courses.id')
        ->leftJoin('academic_levels','employees.academicLevel_id','=','academic_levels.id')
        ->select('employees.id','employees.name','employees.surname','academic_levels.designation as academicLevel','repartitions.designation as repartition','courses.designation as course','delegations.deputy_id as deputy_id')
        ->where('employees.central',"{$central}")
        ->where('employees.division_id','LIKE',"%{$divisionId}%")
        ->where('academic_levels.id','<>',1)
        ->where('repartitions.id','LIKE',"%{$repartitionId}%")
        ->get();
    }

    public static function getReport($central, $divisionId, $repartitionId, $reportId){
        
        $central = ReportHelper::helperCheckNull($central);

        $divisionId = ReportHelper::helperCheckNull($divisionId);

        $repartitionId = ReportHelper::helperCheckNull($repartitionId);

        switch($reportId){
            case 1: return ReportHelper::queryAcademicLevelInformation($central, $divisionId, $repartitionId);
        }
    }

}