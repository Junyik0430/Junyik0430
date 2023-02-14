<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Products;
use App\Imports\SalesImport;
use Maatwebsite\Excel\Facades\Excel;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::orderBy('id','asc')->paginate();

        return view('pages.sales.index', compact('sales'),);
    }

    public function create()
    {
        $productdata['data'] = Products::orderby("username","asc")
        ->get();
          
       return  view("pages.sales.create");       
    }


    public function store(Request $request)
    {
        $request->validate([
            'p_name' => 'required',
            'month' => 'required',
            'total' =>  'required',
            'quantity' =>  'required',
            's_status' => 'required',
        ]);
        
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
