<?php

namespace App\Repository;
use App\Models\Quiz;
use App\Models\subject;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Library;

class LibraryRepository implements LibraryRepositoryInterface{


    
    public function index(){
        $books=Library::all();
        return view('pages.Library.index',compact('books'));
        
        }
        
        
        
        public function create(){
            
        $data['grades']=Grade::all();
        $data['classes']=Classroom::all();
        // $data['teachers']=Teacher::all();
        // $data['subjects']=subject::all();
        $data['sections']=Section::all();
        
        return view('pages.Library.create',$data);
            
        }
        
        
        
        
        public function store($request){
            $Library = new Library();
            $Library->title =$request->title;
            $Library->Grade_id = $request->grade_id;
            $Library->Classroom_id = $request->Classroom_id;
            $Library->section_id = $request->section_id;
            $Library->save();
            return redirect()->route('Library.index');

            // if($request->hasfile('photo')){
            //     foreach ($request->file("photo") as $file) {
            //         # code...
            //        $name= $file->getClientOriginalName();
            //         $file->storeAs('attachments/Library/'.$Library->$name,$file->getClientOriginalName(),'upload_library');
            //         $image->file_name=$name;
            //         $image->save();
            
        
        
     
}
        public function edit($id){
            $grades = Grade::all();
            $book = Library::findorFail($id);
            return view('pages.Library.edit',compact('book','grades'));
        
        
            
        }
        
        
        public function update($request){
        
            // try {

            //     $book = library::findorFail($request->id);
            //     $book->title = $request->title;
    
            //     if($request->hasfile('file_name')){
    
            //         $this->deleteFile($book->file_name);
    
            //         $this->uploadFile($request,'file_name');
    
            //         $file_name_new = $request->file('file_name')->getClientOriginalName();
            //         $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            //     }
    
            //     $book->Grade_id = $request->Grade_id;
            //     $book->classroom_id = $request->Classroom_id;
            //     $book->section_id = $request->section_id;
            //     $book->teacher_id = 1;
            //     $book->save();
            //     toastr()->success(trans('messages.Update'));
            //     return redirect()->route('library.index');
            // } catch (\Exception $e) {
            //     return redirect()->back()->with(['error' => $e->getMessage()]);
            // }
            
        }
        
        
        public function destroy($request){
            $this->deleteFile($request->file_name);
            library::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('Library.index');
        }


        
        public function download($filename){

            // return response()->download(public_path('attachments/library/'.$filename));
        }
        
        
}





?>