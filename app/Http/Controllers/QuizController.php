<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Repository\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    private $quiz; 
   public function __construct(QuizRepositoryInterface  $quizinjection){
    $this->quiz=$quizinjection;
     
    }
    public function index()
    {
        return $this->quiz->index();
    }


    public function create()
    {
        return $this->quiz->create();
    }


    public function store(Request $request)
    {
        return $this->quiz->store($request);
    }


    public function show(Quiz $quiz)
    {
        //
    }


    public function edit( $id)
    {
        return $this->quiz->edit($id);
    }


    public function update(Request $request)
    {
        return $this->quiz->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->quiz->destroy($request);
    }
}
