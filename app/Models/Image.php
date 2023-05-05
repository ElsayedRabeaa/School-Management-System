<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{


    protected $fillable=['file_name','imageable_id','imageable_type'];
    public function Imageable(){
        return $this->morphTo();
    }
}
