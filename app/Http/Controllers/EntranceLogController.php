<?php

namespace App\Http\Controllers;

use App\Models\EntranceLog;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class EntranceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entranceLogs.index')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * 
     * 
     */
    public function search($storeId, $day, $month, $year){

        $day = Helper::helperCheckNull($day);

        $month = Helper::helperCheckNull($month);

        $year = Helper::helperCheckNull($year);

        $logs = array();

        if($storeId !== '*'){

            $logs = DB::table('entrance_logs')
            ->where('entrance_logs.store_id', '=', $storeId)
            ->where('entrance_logs.day', Helper::decideIfLike($day), Helper::decideIfPercent($day))
            ->where('entrance_logs.month', Helper::decideIfLike($month), Helper::decideIfPercent($month))
            ->where('entrance_logs.year', Helper::decideIfLike($year), Helper::decideIfPercent($year))
            ->get();

        }

        return response()->json($logs);


    }
}
