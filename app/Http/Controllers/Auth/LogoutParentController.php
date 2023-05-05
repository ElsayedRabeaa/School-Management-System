<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LogoutParentController extends Controller
{

    public function logout(Request $request){
     Auth::guard('parent')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
  
    return redirect('/');
    }

}
