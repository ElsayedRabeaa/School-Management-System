<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $information=Student::findOrfail(auth()->user()->id);
        return view('pages.students.dashboard.profile',compact('information'));
    }


    public function update(Request $request, $id)
    {
        $information=Student::findOrfail($id);
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
