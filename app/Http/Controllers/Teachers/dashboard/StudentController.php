<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Student;
use App\Models\Attendence;
class StudentController extends Controller
{
  
public function stds(){
        $ids=DB::table('teacher_sections')->where('Teacher_Id',auth()->user()->id)->pluck('Section_Id');
        $students=Student::whereIn('Section_Id',$ids)->get();
        return view("pages.Teachers.dashboard.students.index",compact('students'));
       
}

public function sections(){
$ids=DB::table('teacher_sections')->where('Teacher_Id',auth()->user()->id)->pluck('Section_Id');
$sections_list=Section::whereIn('id',$ids)->get();
return view("pages.Teachers.dashboard.sections.index",compact('sections_list'));
}

public function attendence(Request $request){
        // return $request;
$attendate=date('Y-m-d');
$section_id=$request->section_id;

foreach ($request->attendences as $student_id=>$attendence){
if($attendence == 'presence'){
        $attendence_status= true;  
}
else if($attendence == 'absent'){
        $attendence_status= false;     
}


Attendence::create([
        'classroom_id'=>$request->classroom_id,
        'grade_id'=>1,
        'section_id'=>$request->section_id,
        'student_id'=>$student_id,
        'teacher_id'=>8,
        'date'=>$attendate,
        'attendence_status'=>$attendence_status
]);
}
return redirect()->route('students_t');

}

public function edit_attendence(Request $request){
        $date=date('Y-m-d');
        $student_id=Attendence::where('date',$date)->where('student_id',$request->id)->first();

        if($attendence == 'presence'){
                $attendence_status= true;  
        }
        else if($attendence == 'absent'){
                $attendence_status= false; 
        $student_id->update([
                'attendence_status'=>$attendence_status
        ]);

        return redirect()->route('students_t');

}

}

public function attendence_reports(){
$ids=DB::table('teacher_sections')->where('Teacher_Id',auth()->user()->id)->pluck('Section_Id');
$students=Student::whereIn('Section_Id',$ids)->get();
return view("pages.Teachers.dashboard.students.attendence_report",compact('students'));
        
}



public function attendence_search(Request $request){
$ids=DB::table('teacher_sections')->where('Teacher_Id',auth()->user()->id)->pluck('Section_Id');
$students=Student::whereIn('Section_Id',$ids)->get();

 if($request->student_id == 0){
$Students= Attendence::whereBetween('date',[$request->start, $request->end])->get();
return view("pages.Teachers.dashboard.students.attendence_report",compact('Students','students'));

 } 

 else{
        $Students= Attendence::whereBetween('date',[$request->start, $request->end])->where('student_id',$request->student_id)->get();
      return view("pages.Teachers.dashboard.students.attendence_report",compact('Students','students'));

 }      
}


}
