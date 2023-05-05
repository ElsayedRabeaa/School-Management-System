<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;

class SectionController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades=Grade::with(['sections'])->get();
    // dd($grades);
    $list_Grades=Grade::all();
    $Teachers=Teacher::all();
  return view("pages.section",compact('Grades','list_Grades','Teachers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    

  $section=new Section();
  $section->name_section=['en'=>$request->Section_name_en , 'ar'=>$request->Name_Section_Ar];
  $section->Class_id=$request->Class_id;
  $section->Grade_id=$request->Grade_id;
  $section->status=1;
  $section->save();
  $section->Teachers()->attach($request->Teacher_Id);
   return redirect()->route('section.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update( Request $request)
  {
  $section=Section::findOrfail($request->id);
  $section->Update([
  $section->name_section=['en'=>$request->Section_name_en , 'ar'=>$request->Name_Section_Ar],
  $section->Class_id=$request->Class_id,
  $section->Grade_id=$request->Grade_id,
  // if(isset($request->Status)){
  // $section->status=1;
  //  }
   ]);
     
   return redirect()->route('section.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    Section::findOrfail($request->id)->delete();
    return redirect()->route('section.index');

  }
  
  public function getsection_student($id){

    $classses=Classroom::where('Grade_id',$id)->pluck("Name_Class",'id');
    return $classses;
        
    }


  
}

?>