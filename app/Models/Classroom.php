<?php

namespace App\Models;
// use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model 
{
use HasTranslations;
public $translatable = ['Name_Class'];
protected $fillable=['Name_Class','Grade_id'];

protected $table = 'classrooms';
public $timestamps = true;

public function grades()
{
    return $this->belongsTo('App\Models\Grade', 'Grade_id');
}





}

