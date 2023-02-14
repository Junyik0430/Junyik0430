<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','asc')->paginate();
    
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        
       return  view("pages.category.create");       
    }


    public function store(Request $request)
    {
        
        Category::create($request->post());

       return redirect()->route('category.index')->with('success','Categorys has been created successfully.');

    }

    public function show(Category $Categorys)
    {
        $Categorys = Category::orderBy('id','asc')->paginate();
    
        return view('category.index', compact('Categorys'));
    }

    public function edit($id)
    {   
        $category=Category::find($id);
       
        
        return view('pages.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
      
        $categorys=Category::find($id);
        
        $categorys->fill($request->post())->save();

        return redirect()->route('category.index')->with('success','Category Has Been updated successfully');
    }

    public function destroy($id)
    {  
        Category::find($id)->delete();      
        return redirect()->route('category.index')->with('success','Category has been deleted successfully');
    }

  

    // Fetch User Records
    public function getUser(){
        // Fetch Employees by Departmentid
        $userData['data'] = User::orderby("username","asc")
             ->select('id','username')
             ->get();
        return  view("pages.Categorys.create", compact('userData'));
    }

    public function changeStatus(Request $request)

    {
        $Categorys = Category::find($request->id);
        $Categorys->status = $request->status;
        $Categorys->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
