<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Myparent extends Authenticatable
{
    

 use HasTranslations;
 public $translatable=['Name_Father','Job_Father','Name_Mother','Job_Mother'];
 protected  $table='myparents';
 protected $guarded=[];

//  public function attachements(){

//   return  $this->hasMany('App\Models\ParentAttachment','parent_id');
// }


}
