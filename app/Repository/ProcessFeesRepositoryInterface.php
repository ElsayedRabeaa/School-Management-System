<?php


namespace App\Repository;


interface ProcessFeesRepositoryInterface
{
    public function index();


    public function edit($id);

    public function show($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}