<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dashboard.index');
    }
}
