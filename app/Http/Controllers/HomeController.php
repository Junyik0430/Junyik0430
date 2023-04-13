<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Products;
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
        $totalYearEarn=DB::table('sales')->where('year',2023)->where('s_status',1)->sum('total');
        $eachYear=DB::select("SELECT year from sales GROUP BY year");
        $evgMonthEarn=$totalYearEarn/12;
        $eachYearEarn=DB::select("SELECT SUM(total) as total,SUM(quantity ) as quantity,month,year FROM sales GROUP BY year,month ORDER BY year,STR_TO_DATE(CONCAT('0001 ', month, ' 01'), '%Y %M %d')");        $top5sales=DB::select("SELECT SUM(total) as total,SUM(quantity ) as quantity ,p_name FROM sales GROUP BY p_name DESC LIMIT 5");
        $totalcancelOrder=DB::table('sales')->where('s_status',0)->count('total');
        $products = Products::orderBy('id','asc')->paginate();

        return view('pages.dashboard',compact('sales','totalYearEarn','evgMonthEarn','top5sales','totalcancelOrder', 'products','eachYearEarn','eachYear'));
    }
}
