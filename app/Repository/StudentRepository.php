<?php

namespace App\Repository;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Myparent;
use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Student;

use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface{
public function Create_Students(){
    $data['my_grades']=Grade::all();
    $data['parents']=Myparent::all();
    $data['Bloods']=Blood::all();
    $data['Genders']=Gender::all();
    return view("pages.Add_student",$data);
      


    }


    public function getclass_student($id){

        $classses=Classroom::where('Grade_id',$id)->pluck("Name_Class",'id');
        return $classses;
            
        }

      public function getsection_student($id){

        $sections=Section::where('class_id',$id)->pluck("name_section",'id');
        return $sections;
            
        }


        
            }





?>