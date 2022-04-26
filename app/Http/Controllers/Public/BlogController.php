<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        return view('blog');
    }

    public function blogdetails()
    {
        return view('blogdetails');
    }

    public function bloggerdetails(Request $request)
    {
        $validated = $request->validate([
            'b_name' => 'required',
            'b_email' => 'required|email',
            'b_url' => 'required',
            'b_comment' => 'required',
            'toc'=>'required'
        ]);
        $blogs = new Blog();
        $blogs -> b_name = $request->input('b_name');
        $blogs -> b_email = $request->input('b_email');
        $blogs -> b_url = $request->input('b_url');
        $blogs -> b_comment = $request->input('b_comment');
        $blogs -> save();
        return redirect()->back()-> with('message', 'Your blog has been recorded sucessfully');

    }
}
