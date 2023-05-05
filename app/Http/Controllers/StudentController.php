<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{


    private $Student;


    public function __construct(StudentRepositoryInterface $Student){
        $this->Student=$Student;

    }



    public function index()
    {
      $Students=Student::with('genders','grades','classrooms','sections')->get();
      return view("pages.students",compact('Students'));
    }


    
    public function create()
    {
      return  $this->Student->Create_Students();
    }

    public function store(Request $request){
                    DB::beginTransaction();

        
                    $Student = new Student();
                    $Student->Email = $request->email;
                    $Student->Password = Hash::make($request->password);
                    $Student->Name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                    $Student->blood_id = $request->Blood_id;
                    $Student->Gender_id = $request->gender_id;
                    $Student->Grade_id = $request->grade_id;
                    $Student->classroom_id = $request->class_id;
                    $Student->section_id = $request->section_id;
                    $Student->parent_id = $request->parent_id;
                    $Student->birth_Date = $request->date_year;
                    $Student->academic_year = $request->Joining_Date;
                    $Student->save();
                    if($request->hasfile('photo')){
                        foreach ($request->file("photo") as $file) {
                            # code...
                           $name= $file->getClientOriginalName();
                            $file->storeAs('attachments/students/'.$Student->$name,$file->getClientOriginalName(),'upload_files');
                            $image=new Image();
                            $image->file_name=$name;
                        
                            $image->save();
                        }
                        
                    }
                    return redirect()->route('students.index');

             DB::commit();
            }

    public function show(Request $request,$id)
    {
        $students=Student::findorfail($request->id);

        return view('pages.show_student_more',compact('students'));
    }


    public function edit($id)
    {
        $genders=Gender::all();
        $grades=Grade::all();
        // $classrooms=Classroom::all();
        $sections=Section::all();
        $classes=Classroom::all();
        $students=Student::findorfail($id);
        return view('pages.edit_students',compact('students','genders','grades','sections','classes'));

    }

    public function update(Request $request, $id)
    {
        try {
            $Student = Student::findorfail($request->id);
            $Student->email = $request->Email;
            $Student->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Student->Gender_id = $request->Gender_id;
            $Student->Grade_id = $request->grade_id;
            $Student->classroom_id = $request->class_id;
            $Student->section_id = $request->section_id;
            $Student->save();
            toastr()->success(trans('messages.Update'));
           return redirect()->route('students.index');

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        Student::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('students.index');
    }


public function getclass_student($id){

return $this->Student->getclass_student($id);


}
public function getsection_student($id){

return $this->Student->getsection_student($id);


}



}
