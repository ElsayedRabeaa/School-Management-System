<?php

namespace App\Http\Controllers;
use App\Repository\LibraryRepositoryInterface;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller

{ private $Library; 
    public function __construct(LibraryRepositoryInterface  $libraryninjection){
    $this->Library=$libraryninjection;
     
    }
    public function index()
    {
        return $this->Library->index();
    }


    public function create()
    {
        return $this->Library->create();
    }


    public function store(Request $request)
    {
        return $this->Library->store($request);
    }


    public function show(Library $Library)
    {
        //
    }


    public function edit( $id)
    {
        return $this->Library->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Library->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Library->destroy($request);
    }
}
