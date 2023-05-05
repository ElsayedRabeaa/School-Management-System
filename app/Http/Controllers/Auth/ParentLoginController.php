<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ParentLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo ='parents/dashboard';



    public function __construct()
    {
        $this->middleware('guest:parent,parents/dashboard')
        ->except('logout');
    }
    public function showLoginForm(){

        return view('auth.parents.login');
    }


       public function guard(){
        return Auth::guard('parent');
        }
     
}
