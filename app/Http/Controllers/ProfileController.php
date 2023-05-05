<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(){
        $information=User::findOrfail(auth()->user()->id);
         return view('profile',compact('information'));
       }
    
         public function update(Request $request,$id){
            $information=User::findOrfail($id);
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
