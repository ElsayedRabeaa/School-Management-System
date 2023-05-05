<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model 
{
  use HasTranslations;
  public $translatable = ['name_section'];
  protected $fillable=['name_section','  Grade_id	' , ' class_id'];

    protected $table = 'sections';
    public $timestamps = true;



    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'class_id');
    }


    public function GRADES()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
        public function Teachers()
    {
        return $this->belongsToMany('App\Models\Teacher', 'teacher_sections');
    }

}