<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        return view ('public.about');
    }

    function online(Request $request)
    {
        $abouts = new About();
        $abouts->s_name = $request->input('s_name');
        $abouts->s_email = $request->input('s_email');
        $abouts->s_class = $request->input('s_class');
        $abouts->s_req = $request->input('s_req');
        $abouts->save();
        return redirect()->back()->with('message', 'Student Registered');
    }
}
