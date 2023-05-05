<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\subject;
use App\Models\Section;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Question;
use App\Models\Degree;
use App\Models\User;
use App\Notifications\AddQuiz;

use Illuminate\Support\Facades\Notification;

class QzsController extends Controller
{
    public function index(){
        $quizs=Quiz::where('teacher_id',auth()->user()->id)->get();
        // return $quizs;
        return view("pages.Teachers.dashboard.Qzs.index",compact('quizs'));
    }

    public function show($id){
        $questions=Question::where('quizze_id',$id)->get();
        $quizs=Quiz::findorfail($id);
        return view("pages.Teachers.dashboard.Questions.index",compact('quizs','questions'));
        // return $questions;
    }

    public function create(){
     $data['subjects']=subject::all();
     $data['grades']=Grade::all();
     $data['classes']=Classroom::all();
     $data['sections']=Section::all();
     return view("pages.Teachers.dashboard.Qzs.create",$data);

    }

     public function store(Request $request){
        
        $quizzes = new Quiz();
        $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $quizzes->subject_id = $request->subject_id;
        $quizzes->grade_id = $request->grade_id;
        $quizzes->classroom_id = $request->classroom_id;
        $quizzes->section_id = $request->section_id;
        $quizzes->teacher_id = auth()->user()->id ;
        $quizzes->save();
        $user=User::get();
        $quiz=Quiz::latest()->first();
        Notification::send($user, new AddQuiz($quiz));

        toastr()->success(trans('messages.success'));

        return redirect()->route('Quizs');
    }

    public function edit($id){
        $quizz=Quiz::findorfail($id);
    
        $data['grades']=Grade::all();
        $data['classes']=Classroom::all();
        // $data['teachers']=Teacher::all();
        $data['subjects']=subject::all();
        $data['sections']=Section::all();
        
        return view('pages.Teachers.dashboard.Qzs.edit',$data,compact('quizz'));
    
    
        
    }
    
    
    public function update(Request $request){
    
        try {
            $quizz = Quiz::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->grade_id;
            $quizz->classroom_id = $request->classroom_id;
            $quizz->section_id = $request->section_id;
           
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()-back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    
    
        
    }
    
    
    public function destroy($id){
    
        try {
            Quiz::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    


    public function show_results($id_of_Quiz){

     $degree_of_student=Degree::where('quiz_id',$id_of_Quiz)->get();
     return view('pages.Teachers.dashboard.Qzs.show_results', compact('degree_of_student'));
 

    }
}
