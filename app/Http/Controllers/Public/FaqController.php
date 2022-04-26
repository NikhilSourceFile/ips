<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq()
    {
        return view('faq');
    }

    public function faqform(Request $request)
    {
        $faqs = new Faq();
        $faqs->f_name = $request->input('f_name');
        $faqs->f_email = $request->input('f_email');
        $faqs->f_number = $request->input('f_number');
        $faqs->f_subject = $request->input('f_message');
        $faqs->f_message = $request->input('f_message');
        $faqs->save();
        return redirect()->back()->with('message', 'Contact Registered');
    }
}
