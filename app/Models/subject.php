<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $guarded=[];



    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }


    public function GRADES()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    public function Teachers()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }





}
