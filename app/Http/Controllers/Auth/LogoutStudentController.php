<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutStudentController extends Controller
{

    public function logout(Request $request){
     Auth::guard('student')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
  
    return redirect('/');
    }

}
