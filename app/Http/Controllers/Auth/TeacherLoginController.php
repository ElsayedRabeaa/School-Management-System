<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TeacherLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo ='teachers/dashboard';



    public function __construct()
    {
        $this->middleware('guest:teacher,teachers/dashboard')->except('logout');
    }
     

    public function showLoginForm(){

        return view('auth.teachers.login');
    }
       public function guard(){
        return Auth::guard('teacher');
        }
     
}
