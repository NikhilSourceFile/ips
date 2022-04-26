<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherdetailsController extends Controller
{
    public function teacherdetails()
    {
        return view('teacherdetails');
    }

    public function teachers()
    {
        return view('teachers');
    }
}
