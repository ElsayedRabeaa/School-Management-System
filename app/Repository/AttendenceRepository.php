<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Student;

class AttendenceRepository implements AttendenceRepositoryInterface{

public function index(){
    $Grades=Grade::with(['sections'])->get();
    // dd($grades);
    $list_Grades=Grade::all();
    $Teachers=Teacher::all();
  return view("pages.Attendence.sections",compact('Grades','list_Grades','Teachers'));
}


public function show($id){
$students=Student::with('attendence')->where('section_id',$id)->get();
return view("pages.Attendence.index",compact('students'));

}


public function store($request){

}


}


?>