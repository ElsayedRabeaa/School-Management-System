<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Myparent;
class ProfileController extends Controller
{
    public function show(){
        $information=Myparent::findOrfail(auth()->user()->id);
         return view('profile',compact('information'));
       }
    
         public function update(Request $request,$id){
            $information=Myparent::findOrfail($id);
            if(!empty($request->password)){
    
                $information->email=$request->email;
                $information->password=\Hash::make($request->password);
                $information->save();
          }
          else{
            $information->email=$request->email;
            $information->save();
    
          }
          return redirect()->back();
          }

        }
