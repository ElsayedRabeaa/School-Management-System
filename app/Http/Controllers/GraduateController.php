<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GraduateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Students=Student::onlyTrashed()->get();
        return view("pages.Graduates.index",compact('Students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $grades=Grade::all();
         return view("pages.Graduates.create",compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Students=Student::where('Grade_id',$request->grade_id)->where('classroom_id',$request->class_id)->where('section_id',$request->section_id)->get();
        if($Students->count() < 1){
            return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach($Students as $student){
            $ids=explode(',',$student->id);
            Student::whereIn('id',$ids)->Delete();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function show(Graduate $graduate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function edit(Graduate $graduate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Students=Student::onlyTrashed()->where('id',$request->id)->first()->restore();
        return view("pages.Graduates.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graduate  $graduate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Student::where('id',$request->id)->destroy();
        return view("pages.Graduates.index");

    }
}
