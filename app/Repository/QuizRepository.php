<?php

namespace App\Repository;
use App\Models\Quiz;
use App\Models\subject;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;


class QuizRepository implements QuizRepositoryInterface{

public function index(){
$quizzes=Quiz::all();
return view('pages.Quizes.index',compact('quizzes'));

}



public function create(){
    
$data['grades']=Grade::all();
$data['classes']=Classroom::all();
$data['teachers']=Teacher::all();
$data['subjects']=subject::all();
$data['sections']=Section::all();

return view('pages.Quizes.create',$data);
    
}




public function store( $request){
    // try {

        $quizzes = new Quiz();
        $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $quizzes->subject_id = $request->subject_id;
        $quizzes->grade_id = $request->grade_id;
        $quizzes->classroom_id = $request->classroom_id;
        $quizzes->section_id = $request->section_id;
        $quizzes->teacher_id = $request->teacher_id;
        $quizzes->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Quizs.create');
    // }
    // catch (\Exception $e) {
    //     return redirect()->back()->with(['error' => $e->getMessage()]);
    // }



    
}


public function edit($id){
    $quizz=Quiz::findorfail($id);

    $data['grades']=Grade::all();
    $data['classes']=Classroom::all();
    $data['teachers']=Teacher::all();
    $data['subjects']=subject::all();
    $data['sections']=Section::all();
    
    return view('pages.Quizes.edit',$data,compact('quizz'));


    
}


public function update($request){

    try {
        $quizz = Quiz::findorFail($request->id);
        $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $quizz->subject_id = $request->subject_id;
        $quizz->grade_id = $request->grade_id;
        $quizz->classroom_id = $request->classroom_id;
        $quizz->section_id = $request->section_id;
        $quizz->teacher_id = $request->teacher_id;
        $quizz->save();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Quizs.index');
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }


    
}


public function destroy($request){

    try {
        Quiz::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}




}




?>