<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Products;
use App\Imports\SalesImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::orderBy('id','asc')->paginate();

        return view('pages.sales.index', compact('sales'));
    }

    public function create()
    {
        $products['data'] = Products::orderby("p_name","asc")
        ->get();
          
       return  view("pages.sales.create",compact('products'));       
    }


    public function store(Request $request)
    {
        
       
        DB::beginTransaction();
        try {
            //$date="2023-02-15";
            $year=Carbon::createFromFormat('Y-m-d', $request->date)->format('Y');
            $month=Carbon::createFromFormat('Y-m-d', $request->date)->format('M');
            foreach($request->item as $key => $items)
            {
                $estimatesAdd['p_name']          = $items;
                $estimatesAdd['month']           =  $month;
                $estimatesAdd['year']            = $year;
                $estimatesAdd['s_status']        = '1';
                //$estimatesAdd['unit_cost']     = $request->unit_cost[$key];
                $estimatesAdd['quantity']        = $request->qty[$key];
                $estimatesAdd['total']           = $request->amount[$key];
                Sales::create($estimatesAdd);
            }

            DB::commit();

            return redirect()->route('sales.index')->with('success','Sales has been created successfully.');
        } catch(\Exception $e) {

            dd($e);
            DB::rollback();
            Toastr::error('Add Estimates fail :)','Error');
            return redirect()->back();
        }    
        Sales::create($request->post());

        return redirect()->route('sales.index')->with('success','Sales has been created successfully.');

    }

    public function show(Sales $sales)
    {
        $sales = Contact::orderBy('id','asc')->paginate();
        return view('pages.sales.index', compact('sales'));
    }

    public function edit(Sales $sales)
    {

        return view('pages.sales.edit',compact('sales'));
    }

    public function cancelOrder($id)
    {
        $sales = Sales::find($id);
        $sales->update(['s_status'=>'0']);
        return redirect()->route('sales.index')->with('success','Sales has been cancel successfully.');
    }

    public function update(Request $request, Sales $sales)
    {   
        $sales=Sales::find($id);
        $sales->fill($request->post())->save();
        return redirect()->route('sales.index')->with('success','Sales Has Been updated successfully');

    }

    public function destroy(Sales $sales, $id)
    {
        $sales = Sales::findOrFail($id)->delete();
        
        return redirect()->route('sales.index')->with('success','Sales has been deleted successfully');
    }

    public function importSales(){
        return view('pages.sales.import');
    }

    public function uploadSales(Request $request){
        Excel::import(new SalesImport,$request->file);
        return redirect()->route('sales.index')->with('sucess','Sales import complete');
    }

    public function changeStatus(Request $request)

    {
        $sales = Sales::find($request->id);
        $sales->status = $request->status;
        $sales->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
