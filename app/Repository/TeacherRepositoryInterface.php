<?php
namespace App\Repository;
interface TeacherRepositoryInterface{
  public function getallteachers();      
  public function Getspecialization();      
  public function GetGender();      

    // StoreTeachers
    public function StoreTeachers($request);

    // StoreTeachers
    public function editTeachers($id);

    // UpdateTeachers
    public function UpdateTeachers($request);

    // DeleteTeachers 00000
    public function DeleteTeachers($request);



    

}
    
    ?>