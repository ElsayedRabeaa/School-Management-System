<?php

namespace App\Http\Controllers;

use App\Repository\RecieptStudentRepositoryInterface;
use Illuminate\Http\Request;

class RecieptStudentController extends Controller
{
    protected $RecieptStudent;
    public function __construct(RecieptStudentRepositoryInterface $RecieptStudent)
    {
        $this->RecieptStudent = $RecieptStudent;
    }

    public function index()
    {
        return $this->RecieptStudent->index();
    }
 


    public function store(Request $request)
    {
        return $this->RecieptStudent->store($request);
    }


    public function show($id)
    {
        return $this->RecieptStudent->show($id);
    }


    public function edit($id)
    {
        return $this->RecieptStudent->edit($id);
    }


    public function update(Request $request)
    {
        return $this->RecieptStudent->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->RecieptStudent->destroy($request);
    }
}
