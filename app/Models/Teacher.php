<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\MustVerifyEmail;

class Teacher extends Authenticatable
{
    // use HasTranslations;
    // public $translatable = ['Name'];
    protected $guarded=[];
    protected $table='teachers';

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }

       public function Teachers()
    {
        return $this->hasMany('App\Models\subject', 'teacher_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }

    public function sections()
    {
        return $this->belongsToMany('App\Models\Section', 'teacher_sections');
    }
}