<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id','asc')->paginate();
        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        $users['data'] = User::orderby("username","asc")->get();   
       return  view("pages.products.create",compact('users'));       
    }

    public function store(Request $request)
    {
        Products::create($request->post());
        return redirect()->route('products.index')->with('success','Sales has been created successfully.');
    }

    public function show(Products $products)
    {
        $products = Contact::orderBy('id','asc')->paginate();
        return view('pages.products.index', compact('products'));
    }

    public function edit( $id)
    {  $products=Products::find($id);
        $users['data'] = User::orderby("username","asc")->get();   
        return view('pages.products.edit',compact('products','users'));
    }

    public function update(Request $request, Products $products)
    {   
        $products=Products::find($id);
        $products->fill($request->post())->save();
        return redirect()->route('products.index')->with('success','Sales Has Been updated successfully');

    }

    public function destroy(Products $products, $id)
    {
        $products = Products::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('success','Sales has been deleted successfully');
    }

    public function changeStatus(Request $request)

    {
        $products = Products::find($request->id);
        $products->status = $request->status;
        $products->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
