<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function class()
    {
        return view('class');
    }

    public function classdetails()
    {
        return view('classdetails');
    }
}
