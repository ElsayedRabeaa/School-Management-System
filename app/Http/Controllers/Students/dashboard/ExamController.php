<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
class ExamController extends Controller
{

    public function index()
    {
       $quizes=Quiz::where('grade_id',auth()->user()->Grade_id)
       ->where('classroom_id',auth()->user()->classroom_id)
       ->where('section_id',auth()->user()->section_id)
       ->orderBy('id','DESC')->get();
    //    return $quizes;
    return view("pages.students.dashboard.index",compact('quizes'));

    }


    
    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }

 
    public function show($Quiz_id)
    {
    //   return $Quiz_id;
    $student_id=\Auth::user()->id;
   return view("pages.students.dashboard.show",compact('student_id','Quiz_id'));
    }

    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
