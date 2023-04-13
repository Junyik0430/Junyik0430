<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('id','asc')->paginate();
        return view('pages.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {   
        $user->fill($request->post())->save();
        
        return redirect()->route('user.index')->with('success','User Has Been updated successfully');
    }

    public function toUser($id)
    {
        $users = User::find($id);
        $users->update(['role_as'=>'0']);
        return redirect()->route('user.index')->with('success','Has been change to User successfully.');
    }
    public function toAdmin($id)
    {
        $users = User::find($id);
        $users->update(['role_as'=>'1']);
        return redirect()->route('user.index')->with('success','Has been change to Admin successfully.');
    }

    public function destroy( User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','Product has been deleted successfully');
    }
}
