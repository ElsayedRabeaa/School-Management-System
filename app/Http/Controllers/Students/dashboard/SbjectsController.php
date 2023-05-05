<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
class SbjectsController extends Controller
{
    public function index()
    {
       $Subjects=Subject::where('grade_id',auth()->user()->Grade_id)
       ->where('classroom_id',auth()->user()->classroom_id)
       ->orderBy('id','DESC')->get();
    //    return $Subjects;
    return view("pages.students.dashboard.subject",compact('Subjects'));

    }
}
