<?php

namespace App\Http\Controllers;
use App\Repository\AttendenceRepositoryInterface;
use App\Attendence;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
      private $Attendence;

    public function __construct(AttendenceRepositoryInterface $Attendence){
    $this->Attendence=$Attendence;
    }

    public function index()
    {
        return $this->Attendence->index();
    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return $this->Attendence->show($id);
    }


    public function edit(Attendence $attendence)
    {
        //
    }


    public function update(Request $request, Attendence $attendence)
    {
        //
    }

    public function destroy(Attendence $attendence)
    {
        //
    }

    

}
