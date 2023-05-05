<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studnets_of_parents=\App\Models\Student::where('parent_id',auth()->user()->id)->get();
        
        return view('pages.Parents.Attendence.index',compact('studnets_of_parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
        public function attendence_search(Request $request){
            $ids=DB::table('teacher_sections')->where('Teacher_Id',auth()->user()->id)->pluck('Section_Id');
            $students=Student::whereIn('Section_Id',$ids)->get();
            
             if($request->student_id == 0){
            $Students= Attendence::whereBetween('date',[$request->start, $request->end])->get();
            return view("pages.Parents.dashboard.Attendence.index",compact('Students','students'));
            
             } 
            
             else{
                    $Students= Attendence::whereBetween('date',[$request->start, $request->end])->where('student_id',$request->student_id)->get();
                  return view("pages.Parents.dashboard.Attendence.index",compact('Students','students'));
            
             }      
            }
    

 
}
