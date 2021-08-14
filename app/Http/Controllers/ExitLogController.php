<?php

namespace App\Http\Controllers;

use App\Models\ExitLog;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class ExitLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('exitLogs.index')->with([
            'stores' => Store::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * 
     * 
     */
    public function search($storeId, $day, $month, $year)
    {

        $day = Helper::helperCheckNull($day);

        $month = Helper::helperCheckNull($month);

        $year = Helper::helperCheckNull($year);

        $day = Helper::handleOneDigitNumbers($day);


        $logs = array();

        if ($storeId !== '*') {

            $logs = DB::table('items')
                ->leftJoin('receipts', 'receipts.id', '=', 'items.receipt_id')
                ->where('receipts.store_id', '=', $storeId)
                ->where('receipts.day', Helper::decideIfLike($day), Helper::decideIfPercent($day))
                ->where('receipts.month', Helper::decideIfLike($month), Helper::decideIfPercent($month))
                ->where('receipts.year', Helper::decideIfLike($year), Helper::decideIfPercent($year))
                ->get();
        }

        return response()->json($logs);
    }
}
