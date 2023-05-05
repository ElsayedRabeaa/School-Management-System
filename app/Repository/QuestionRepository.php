<?php

namespace App\Repository;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\subject;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;


class QuestionRepository implements QuestionRepositoryInterface{

public function index(){
$questions=Question::all();
$quizzes=Quiz::all();
return view('pages.Questions.index',compact('questions','quizzes'));

}



public function create(){
    
// $data['grades']=Grade::all();
// $data['classes']=Classroom::all();
// $data['teachers']=Teacher::all();
$data['quizzes']=Quiz::all();
// $data['sections']=Section::all();

return view('pages.Questions.create',$data);
    
}




public function store( $request){


    try {
        $question = new Question();
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quizze_id = $request->quizze_id;
        $question->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Questions.create');
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }

    
}


public function edit($id){
 
    $question = Question::findorfail($id);
    $quizzes = Quiz::get();
    return view('pages.Questions.edit',compact('question','quizzes'));


    
}


public function update($request){

    try {
        $question = Question::findorfail($request->id);
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quizze_id = $request->quizze_id;
        $question->save();
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Questions.index');
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }


    
}


public function destroy( $request ){
    try {
        Question::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}




}




?>