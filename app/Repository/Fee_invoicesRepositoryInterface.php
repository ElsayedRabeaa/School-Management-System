<?php


namespace App\Repository;


interface Fee_invoicesRepositoryInterface
{
    public function index();
    public function show($id);
    public function create();
    public function edit($id);
    public function store($request);
    public function update($request);
    public function destroy($request);


}