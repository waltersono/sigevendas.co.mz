<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

/**
 * Controller responsible for handling dashboard requests
 * 
 * @autor Walter Sono
 */
class DashboardController extends Controller
{
    /**
     * Displays the dashboard page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if(Auth::user()->role == 'Operator'){

            return redirect()->route('sells.index');

        } else {

            $stores = $this->getStores();

            return view('dashboard.index')->with('stores', $stores);

        }
    }


    public function getData($storeId){

        $date = $this->getDateOfWeek(0);

        $monday = DB::table('receipts')
        ->leftJoin('users','users.id','=','receipts.user_id')
        ->leftJoin('stores','stores.id','=','users.store_id')
        ->select('receipts.total')
        ->where('stores.id',$storeId)
        ->where('day',$date['day'])
        ->where('month',$date['month'])
        ->where('year',$date['year'])
        ->sum('total');

        $date = $this->getDateOfWeek(1);

        $tuesday = DB::table('receipts')
        ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
        ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
        ->select('receipts.total')
        ->where('stores.id', $storeId)
        ->where('day', $date['day'])
        ->where('month', $date['month'])
        ->where('year', $date['year'])
        ->sum('total');

        $date = $this->getDateOfWeek(2);

        $wednesday = DB::table('receipts')
        ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
        ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
        ->select('receipts.total')
        ->where('stores.id', $storeId)
        ->where('day', $date['day'])
        ->where('month', $date['month'])
        ->where('year', $date['year'])
        ->sum('total');

        $date = $this->getDateOfWeek(3);

        $thursday = DB::table('receipts')
        ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
        ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
        ->select('receipts.total')
        ->where('stores.id', $storeId)
        ->where('day', $date['day'])
        ->where('month', $date['month'])
        ->where('year', $date['year'])
        ->sum('total');

        $date = $this->getDateOfWeek(4);

        $friday = DB::table('receipts')
        ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
        ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
        ->select('receipts.total')
        ->where('stores.id', $storeId)
        ->where('day', $date['day'])
        ->where('month', $date['month'])
        ->where('year', $date['year'])
        ->sum('total');

        $date = $this->getDateOfWeek(5);

        $saturday = DB::table('receipts')
        ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
        ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
        ->select('receipts.total')
        ->where('stores.id', $storeId)
        ->where('day', $date['day'])
        ->where('month', $date['month'])
        ->where('year', $date['year'])
        ->sum('total');

        $date = $this->getDateOfWeek(6);

        $sunday = DB::table('receipts')
        ->leftJoin('users', 'users.id', '=', 'receipts.user_id')
        ->leftJoin('stores', 'stores.id', '=', 'users.store_id')
        ->select('receipts.total')
        ->where('stores.id', $storeId)
        ->where('day', $date['day'])
        ->where('month', $date['month'])
        ->where('year', $date['year'])
        ->sum('total');

        $result = array(
            'monday' => $monday, 
            'tuesday' => $tuesday, 
            'wednesday' => $wednesday, 
            'thursday' => $thursday,
            'friday' => $friday,
            'saturday' => $saturday,
            'sunday' => $sunday);


        return response()->json($result);
    }

    private function getDateOfWeek($i){

        $day = Carbon::now()->startOfWeek()->addDays($i)->day;
        $month = Carbon::now()->startOfWeek()->addDays($i)->month;
        $year = Carbon::now()->startOfWeek()->addDays($i)->year;
        
        $date = array('day' => $day, 'month' => $month, 'year' => $year);

        return $date;
    }

    private function getStores(){

        $stores = DB::table('stores')
        ->leftJoin('receipts','receipts.store_id','=','stores.id')
        ->select('stores.id as id', 'stores.designation',DB::raw('SUM(receipts.total) as total'))
        ->where('stores.user_id',Auth::user()->id)
        ->groupBy('stores.id','stores.designation')
        ->get();

        return $stores;
        
    }


}
