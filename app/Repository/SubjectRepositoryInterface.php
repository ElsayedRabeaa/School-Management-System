<?php


namespace App\Repository;


interface SubjectRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
  
    public function get_class_subject($id);

}