<?php

namespace App\Http\Controllers;
use App\Repository\QuestionRepositoryInterface;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $question; 
    public function __construct(QuestionRepositoryInterface  $questioninjection){
    $this->question=$questioninjection;
     
    }
    public function index()
    {
        return $this->question->index();
    }


    public function create()
    {
        return $this->question->create();
    }


    public function store(Request $request)
    {
        return $this->question->store($request);
    }


    public function show(question $question)
    {
        //
    }


    public function edit( $id)
    {
        return $this->question->edit($id);
    }


    public function update(Request $request)
    {
        return $this->question->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->question->destroy($request);
    }
}
