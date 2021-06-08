<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Receipt;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function index()
    {
        $operators = User::where('role', 'Operator')->where('user_id', Auth::user()->id)->get();

        return view('stats.index')->with([
            'receipts' => Receipt::all(),
            'stores'    => Store::where('user_id', Auth::user()->id)->get(),
            'operators'    => $operators,
        ]);
    }

    /**
     * Display a statistics of items sold
     * 
     * @param int storeId
     * @param int operatorId
     * @param string data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($storeId, $month)
    {

        $month = Helper::helperCheckNull($month);

        $year = date('Y');

        $stats = array();

        if ($storeId !== '*') {

            $stats = DB::table('items')
                ->leftJoin('receipts', 'receipts.id', '=', 'items.receipt_id')
                ->select(
                    'items.product_name',
                    DB::raw('SUM(items.quantity) as quantity'),
                    DB::raw('SUM(items.sub_total) as total_cash')
                )
                ->where('receipts.store_id', '=', $storeId)
                ->where('items.created_at', 'LIKE', "{$year}-{$month}%")
                ->groupBy('product_name')
                ->get();
        }

        return response()->json($stats);
    }
}
