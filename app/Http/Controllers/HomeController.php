<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use DB;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sales =DB::table('sales')->select('id','p_name')->get();
        $sales = Sales::orderBy('id','asc')->paginate();
        $totalYearEarn=DB::table('sales')->where('year',2023)->sum('total');
        $evgMonthEarn=$totalYearEarn/12;
        $top5sales=DB::select("SELECT SUM(total) as total ,p_name FROM sales GROUP BY p_name DESC LIMIT 5");
        $totalcancelOrder=DB::table('sales')->where('s_status',0)->count('total');

        return view('pages.dashboard',compact('sales','totalYearEarn','evgMonthEarn','top5sales','totalcancelOrder'));
    }
}
