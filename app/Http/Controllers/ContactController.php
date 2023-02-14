<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\ContactImport;
use Maatwebsite\Excel\Facades\Excel;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id','asc')->paginate();
        return view('pages.contacts.index', compact('contacts'));
    }

    public function create()
    {
        $userData['data'] = User::orderby("username","asc")
        ->select('id','username')
        ->get();
          
       return  view("pages.contacts.create", compact('userData'));       
    }


    public function store(Request $request)
    {
        $request->validate([
            'c_owner' => 'required',
            'c_name' => 'required',
            'c_phone' =>  'required',
            'c_mobile' =>  'required',
            'c_company' => 'required',
            'c_email' => 'email:rfc,dns',
            'c_secondaryemail' => 'email:rfc,dns',
            'c_other_acc' => 'required',
            'c_status' => 'required',
        ]);
        
        Contact::create($request->post());

        return redirect()->route('contacts.index')->with('success','Contacts has been created successfully.');

    }

    public function show(Contact $contacts)
    {
        $contacts = Contact::orderBy('id','asc')->paginate();
        return view('pages.contacts.index', compact('contacts'));
    }

    public function edit($id)
    {
        $contacts=Contact::find($id);
        return view('pages.contacts.edit',compact('contacts'));
    }

    public function update(Request $request, $id)
    {   
        $contacts=Contact::find($id);
        $contacts->fill($request->post())->save();
        return redirect()->route('contacts.index')->with('success','Contact Has Been updated successfully');
    }

    public function destroy(Contact $contacts, $id)
    {
        $contacts = Contact::findOrFail($id)->delete();
        
        return redirect()->route('contacts.index')->with('success','Contact has been deleted successfully');
    }

    public function importContacts(){
        return view('pages.contacts.import');
    }

    public function uploadContacts(Request $request){
        Excel::import(new ContactImport,$request->file);
        return redirect()->route('contacts.index')->with('sucess','Contact import complete');
    }

    // Fetch User Records
    public function getUser(){
        // Fetch Employees by Departmentid
        $userData['data'] = User::orderby("username","asc")
             ->select('id','username')
             ->get();
        return  view("pages.contacts.create", compact('userData'));
    }

    public function changeStatus(Request $request)

    {
        $contacts = Contact::find($request->id);
        $contacts->status = $request->status;
        $contacts->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

}