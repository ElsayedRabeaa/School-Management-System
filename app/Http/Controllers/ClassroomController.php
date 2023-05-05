<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Grades=Grade::all();
        $myclassrooms =Classroom::with('grades')->get();
        return view('pages.classroom',compact('myclassrooms','Grades'));

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
    //  return $request;

        // try{
        $List_Classes=$request->List_Classes;
        foreach ($List_Classes as $List_Classe) {
            # code...
            $class= new Classroom();
            $class->Name_Class = ['en'=> $List_Classe['Name_class_en'],'ar' => $List_Classe['Name']  ];
            $class->Grade_id=$List_Classe['Grade_id'];
            $class->save();
        }
        return Redirect()->route('classroom.index');
        
        }
        // catch(){

        // }



    /*
    */

        
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
      $id=$request->id;
      $classrooms=Classroom::findOrfail($id);
      $classrooms->Update([
      $classrooms->Name_Class=['ar'=>$request->Name , 'en'=>$request->Name_en],
      $classrooms->Grade_id=$request->grade_id,

      ]);
      return Redirect()->route('classroom.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
     $id=$request->id_del;
     Classroom::findOrfail($id)->delete();
      return Redirect()->route('classroom.index');
    }

    public function delete_all(Request $request)
    {
    //    return $request->id_all;
   $delete_all=explode(',',$request->id_all);
   classroom::whereIn('id',$delete_all)->Delete();
   return redirect()->route('classroom.index');
    }


public function filter_grades(Request $request){
// return $request;
$grades=Grade::all();
$search=Classroom::select('*')->where('Grade_id',$request->grade_id)->get();
return view('pages.classroom',compact('grades'))->withDetailes($search);



     
}

public function getclass($id){

$classses=Classroom::where('Grade_id',$id)->pluck("Name_Class",'id');
return $classses;
    
}

// public function getclass_student($id){

//     $classses=Classroom::where('Grade_id',$id)->pluck("Name_Class",'id');
//     return $classses;
        
//     }

}

?>