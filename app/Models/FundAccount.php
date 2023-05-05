<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    
    protected $guarded=[];




public function Receipt(){
    return $this->belongsTo('App\Models\RecieptStudent','receipt_id');
}
}
