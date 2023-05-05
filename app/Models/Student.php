<?php

namespace App\Models;
use App\Models\Blood;
use App\Models\Myparent;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Authenticatable
{
    use softDeletes;
    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];
    protected $table='students';
    public $timestamps = false;


   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


  
    public function bloods(){
        return   $this->belongTo('App\Models\Blood','blood_id');
        }
        
    public function classrooms(){
        return   $this->belongsTo('App\Models\Classroom','classroom_id');
        }
        
    public function grades(){
        return   $this->belongsTo('App\Models\Grade','Grade_id');
        }
        public function sections(){
        return   $this->belongsTo('App\Models\Section','section_id');
        }
        public function genders(){
        return   $this->belongsTo('App\Models\Gender','Gender_id');
        }
        public function parent(){
        return   $this->belongsTo('App\Models\Myparent','parent_id');
        }

      public function attendence(){
        return   $this->hasMany('App\Models\Attendence','student_id');
        }

        public function student_account(){
            return   $this->hasMany('App\Models\Student_account','student_id');
        }
       
       
       

    public function images(){
    return   $this->morphMany('App\Models\Image','Imageable');
    }
}
