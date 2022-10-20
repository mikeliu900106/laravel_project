<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;



class PageController extends Controller
{
    function index(Request $request)
    {
        $Student  = Student::all();
        return view('index',[
            'Students'=> $Student,
        ]); 
    }
}
