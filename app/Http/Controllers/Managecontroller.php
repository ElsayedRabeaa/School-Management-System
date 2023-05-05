<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Managecontroller extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
        $this->middleware('student');
        $this->middleware('parent');
      
    }




    public function home()
    {
        return view('selection');
    }
}
