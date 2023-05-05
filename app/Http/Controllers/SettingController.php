<?php

namespace App\Http\Controllers;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $collection=setting::all();
        $setting['settings']=$collection->flatmap(function ($collection){
            return[$collection->key=>$collection->value];
        });
        return view('pages.settings.index',$setting);
        // return $collection;
    }


    public function update(){
        
    }
}




