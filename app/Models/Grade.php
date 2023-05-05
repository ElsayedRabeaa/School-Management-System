<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model 
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name','note'];
    protected $table = 'gades';
    public $timestamps = true;


public function sections(){

return $this->hasMany('App\Models\Section','Grade_id');

}



}