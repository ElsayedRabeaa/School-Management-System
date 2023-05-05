<?php

namespace App\Http\Controllers;

use App\ProcessFees;
use App\Repository\ProcessFeesRepositoryInterface;
use Illuminate\Http\Request;

class ProcessFeesController extends Controller
{
    protected $ProcessFees;

    public function __construct(ProcessFeesRepositoryInterface $ProcessFees)
    {
        $this->ProcessFees = $ProcessFees;
    }

    public function index()
    {
        return $this->ProcessFees->index();
    }



    public function store(Request $request)
    {
        return $this->ProcessFees->store($request);
    }

    public function edit($id)
    {
        return $this->ProcessFees->edit($id);
    }


     public function show($id)
    {
        return $this->ProcessFees->show($id);
    }

    public function update(Request $request)
    {
        return $this->ProcessFees->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->ProcessFees->destroy($request);
    }
    

    // public function get_class_fee_student($id){

    //     return $this->ProcessFees->get_class_fee_student($id);
        
        
    //     }
}
