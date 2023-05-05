<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessFees extends Model
{
    protected $guarded=[];
    protected $table='process_fees';

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
}
