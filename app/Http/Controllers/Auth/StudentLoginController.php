<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StudentLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo ='students/dashboard';



    public function __construct()
    {
        $this->middleware('guest:student,students/dashboard')->except('logout');
    }

    public function showLoginForm(){

        return view('auth.students.login');
    }

       public function guard(){
        return Auth::guard('student');
        }

        
        public function x(Request  $request){
            return $request;
        }
     
}
