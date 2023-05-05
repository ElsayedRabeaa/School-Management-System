<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades=Grade::all();
    return view('pages.grade',compact('grades'));
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
  public function store(Request  $request)
  {
    // $validated = $request->validated();
   try{
    $grade= new Grade();
    $grade->name=['en'=>$request->name_en , 'ar'=>$request->name_ar];
    $grade->notes=$request->note;
    $grade->save();
    // toastr()->success('Successfully Inserted ');
    return redirect()->route('grade_list.index');
   }
   catch(\Exception $e){

  return Redirect()->back()->withErrors(['error'=>$e->getMessage()]);

   }   
    
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
    $grades= Grade::findOrfail($request->id);
    $grades->Update([
      $grades->name=['ar'=>$request->name_ar , 'en'=>$request->name_en],
    ]);
    return Redirect()->route('grade_list.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
  $classroom=Classroom::where('Grade_id',$request->id)->pluck('Grade_id');
  if($classroom->count()==0){
  $grade=Grade::findOrfail($request->id)->delete();
   return redirect()->route('grade_list.index');

  }
  else{


  }
    // $grades=Grade::findOrfail($request->id)->delete();
    return Redirect()->route('grade_list.index');
  }
  
}

?>