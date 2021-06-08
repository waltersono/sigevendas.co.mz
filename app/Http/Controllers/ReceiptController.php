<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use PHPUnit\TextUI\Help;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = User::where('role', 'Operator')->where('user_id', Auth::user()->id)->get();

        return view('receipts.index')->with([
            'receipts' => Receipt::all(),
            'stores'    => Store::where('user_id', Auth::user()->id)->get(),
            'operators'    => $operators,
        ]);
    }

    /**
     * Display a list of receipts base on 
     * 
     * @param int storeId
     * @param int operatorId
     * @param string data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($storeId, $operatorId, $day, $month, $year)
    {

        $day = Helper::helperCheckNull($day);

        $month = Helper::helperCheckNull($month);

        $year = Helper::helperCheckNull($year);

        $day = Helper::handleOneDigitNumbers($day);

        $receipts = array();

        if ($operatorId !== '*' && $storeId !== '*') {

            $receipts = DB::table('receipts')
                ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
                ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
                ->select('receipts.id as ID', 'receipts.created_at', 'stores.designation as store', 'users.name as operator', 'total', 'paid', 'change', 'customer_name')
                ->where('users.id', '=', $operatorId)
                ->where('stores.id', '=', $storeId)
                ->where('receipts.day', Helper::decideIfLike($day), Helper::decideIfPercent($day))
                ->where('receipts.month', Helper::decideIfLike($month), Helper::decideIfPercent($month))
                ->where('receipts.year', Helper::decideIfLike($year), Helper::decideIfPercent($year))
                ->get();
        } else if ($operatorId !== '*' && $storeId === '*') {

            $receipts = DB::table('receipts')
                ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
                ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
                ->select('receipts.id as ID', 'receipts.created_at', 'stores.designation as store', 'users.name as operator', 'total', 'paid', 'change', 'customer_name')
                ->where('users.id', '=', $operatorId)
                ->where('receipts.day', Helper::decideIfLike($day), Helper::decideIfPercent($day))
                ->where('receipts.month', Helper::decideIfLike($month), Helper::decideIfPercent($month))
                ->where('receipts.year', Helper::decideIfLike($year), Helper::decideIfPercent($year))
                ->get();
        } else if ($operatorId === '*' && $storeId !== '*') {

            $receipts = DB::table('receipts')
                ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
                ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
                ->select('receipts.id as ID', 'receipts.created_at', 'stores.designation as store', 'users.name as operator', 'total', 'paid', 'change', 'customer_name')
                ->where('stores.id', '=', $storeId)
                ->where('receipts.day', Helper::decideIfLike($day), Helper::decideIfPercent($day))
                ->where('receipts.month', Helper::decideIfLike($month), Helper::decideIfPercent($month))
                ->where('receipts.year', Helper::decideIfLike($year), Helper::decideIfPercent($year))
                ->get();
        } else if ($day !== NULL || $month !== NULL || $year !== NULL) {

            $receipts = DB::table('receipts')
                ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
                ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
                ->select('receipts.id as ID', 'receipts.created_at', 'stores.designation as store', 'users.name as operator', 'total', 'paid', 'change', 'customer_name')
                ->where('receipts.day', Helper::decideIfLike($day), Helper::decideIfPercent($day))
                ->where('receipts.month', Helper::decideIfLike($month), Helper::decideIfPercent($month))
                ->where('receipts.year', Helper::decideIfLike($year), Helper::decideIfPercent($year))
                ->get();
        }

        return response()->json($receipts);
    }
}
