<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Helpers\ReportHelper;
use App\Models\Delegation;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
//use Barryvdh\DomPDF\Facade as PDF;
//use Knp\Snappy\Pdf as PDF;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class ReportController extends Controller
{
    public function index(){

        return view('reports.index',['reports' => Report::all()]);

    }

    public function getReport($central, $divisionId, $repartitionId, $reportId){

        $report = ReportHelper::getReport($central, $divisionId, $repartitionId, $reportId);

        return response()->json($report, 200);
    }

    public function downloadReport($central, $divisionId, $repartitionId, $reportId){

        $report = ReportHelper::getReport($central, $divisionId, $repartitionId, $reportId);

        $pdf = PDF::loadView('reports.academicLevelInformationReport', $report);

        return $pdf->download("INAS Angoche - Informacao do Nival Academico.pdf");

    } 



}
