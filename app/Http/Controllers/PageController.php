<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }

    public function vr()
    {
        return view("pages.virtual-reality");
    }

    public function rtl()
    {
        return view("pages.rtl");
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

    
    public function factorauthentication()
    {
        return view("pages.2FA");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }

    public function suggestForm()
    {
        $contactData['data'] = Contact::orderby("c_name","asc")->get();
          
       return  view("pages.suggestform", compact('contactData'));      
    }

    public function sendMail(Request $request) {
        $validator = \Validator::make($request->all(), [
                                    'email' => 'required|email|max:255',
                                    'title' => 'required',
                                    'content' => 'required']
        );
        
    
            if ($validator->fails()) {
                return Redirect::back()->with($validator);
            }
        $email = $request->email;
        $title = $request->title;
        $content = $request->content;
    
    
        Mail::raw($content, function ($message) use ($email, $title){
            $message->from('randomemail@gmail.com');
            $message->to($email);
            $message->subject($title);
        });
        return back()->with('status', 'You have successfully sent an email to the admin!');
    
    }
}
