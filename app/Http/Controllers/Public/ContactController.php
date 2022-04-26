<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function contactform(Request $request)
    {
        $validated = $request->validate([
            'c_name' => 'required',
            'c_email' => 'required|email',
            'c_number' => 'required',
            'c_subject' => 'required',
            'c_message' => 'required'
        ]);
        $contacts = new Contact();
        $contacts->c_name = $request->input('c_name');
        $contacts->c_email = $request->input('c_email');
        $contacts->c_number = $request->input('c_number');
        $contacts->c_subject = $request->input('c_subject');
        $contacts->c_message = $request->input('c_message');
        $contacts->save();
        return redirect()->back()->with('message', 'Contact Registered');
    }

    public function subscribe(Request $request)
    {
        $subscribes = new Subscribe();
        $subscribes -> n_email = $request->input('n_email');
        $subscribes->save();
        return redirect()->back()->with('message', 'Subscribed Successfully');
    }
}
