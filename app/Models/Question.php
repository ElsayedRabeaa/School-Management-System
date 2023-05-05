<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  
    protected $guarded=[];
    public function Quizes(){
   return $this->belongsTo('App\Models\Quiz','quizze_id');
    }
}
