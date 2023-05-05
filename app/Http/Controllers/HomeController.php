<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
      
    }

    public function index()
    {
        return view('dashboard');
    }
   
    public function home()
    {
        return view('selection');
    }
}