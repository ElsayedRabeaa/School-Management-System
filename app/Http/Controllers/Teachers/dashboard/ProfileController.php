<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function show(){
    $information=Teacher::findOrfail(auth()->user()->id);
     return view('pages.Teachers.dashboard.profile',compact('information'));
   }

     public function update(Request $request,$id){
        $information=Teacher::findOrfail($id);
        if(!empty($request->password)){

            $information->email=$request->email;
            $information->password=Hash::make($request->password);
            $information->save();
      }
      else{
        $information->email=$request->email;
        $information->save();

      }
      return redirect()->back();
      }
}
