<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecieptStudent extends Model
{
    
     protected $guarded=[];
     protected $table='reciept_students';

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
    
}
