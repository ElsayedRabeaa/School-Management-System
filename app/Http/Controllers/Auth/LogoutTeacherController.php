<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutTeacherController extends Controller
{

    public function logout(Request $request){
     Auth::guard('teacher')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
  
    return redirect('/');
    }

}
