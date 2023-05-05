<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded=[];
       
    protected $table='degrees';
   public function students(){
    return $this->belongsTo('App\Models\Student','student_id');
   }

    public function questions(){
    return $this->belongsTo('App\Models\Question','question_id');
   }

    public function quizze(){
    return $this->belongsTo('App\Models\Quiz','quiz_id');
   }
  
}
