<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Attendence;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $studnets_of_parents=Student::where('parent_id',auth()->user()->id)->get();
    //   dd($studnets_of_parents);
    return view('pages.parents.childern.index',compact('studnets_of_parents'));
    }


  

 
    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        $student=Student::findorfail($id);
        if($student->parent_id == auth()->user()->id){
            $degrees=Degree::where('student_id',$id)->get();
            // return $degrees;
        return view('pages.Parents.degrees.index',compact('degrees'));

        }
        else{
            return redirect()->back();
        }
    }


    public function edit($id)
    {
       

    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
    public function attendence(){
      $studnets_of_parents=Student::where('parent_id',auth()->user()->id)->get();
    //   $attendence=Attendence::where('student_id',)

    }
}
