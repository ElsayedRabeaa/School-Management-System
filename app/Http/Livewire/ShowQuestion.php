<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Degree;
class ShowQuestion extends Component
{





    public 
    $quizze_id,
    $student_id,
    $data,
    $counter=0,
    $count_questions=0;
    
    public function render()
    {
        $this->data=Question::where('quizze_id',$this->quizze_id)->get();
    //    dd($this->data);
    $this->count_questions=$this->data->count();
        return view('livewire.show-question',['data']);
    }
  
    public function nextQuestion($question_id ,$score , $answer, $right_answer){

        $student_degrees=Degree::where('student_id',$this->student_id)->where('quiz_id',$this->quizze_id)->first();
        if($student_degrees == null){
            $insert_degree= new Degree();
            $insert_degree->quiz_id=$this->quizze_id;
            $insert_degree->student_id=$this->student_id;
            $insert_degree->question_id=$question_id;
       if(strcmp(trim($answer), trim($right_answer))  === 0 ){
         $insert_degree->scoer += $score;
       }
       else{


        $insert_degree->scoer +=0;

       }
       $insert_degree->date=date('Y-m-d');
       $insert_degree->save();
        }




     else{
        $insert_degree->question_id=$question_id;
        if(strcmp(trim($answer), trim($right_answer))  === 0 ){
            $insert_degree->scoer += $score;
            
          }
          else{
   
   
           $insert_degree->scoer +=0;
   
          }
          $insert_degree->save();
     }
   if($this->counter < $this->count_questions -1){
     $this->counter ++;
   }else{
    return redirect()->route('Exams_students.index');
   }

    }


}
