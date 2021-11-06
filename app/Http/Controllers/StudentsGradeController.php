<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Grade;
use App\Student;
use App\StudentsGrade;

class StudentsGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('studentsgrades.list',[
            "grades"=>Grade::all(),
            "studentsgrades"=>StudentsGrade::all(),
            "students"=>Student::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentgrade = new StudentsGrade($request->except(['_token']));
        $studentgrade->save();
        return Redirect::route('studentsgrades.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        StudentsGrade::find($id)->update($request->except(['_token','_method']));
        return Redirect::route('studentsgrades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentsGrade::find($id)->delete();
        return Redirect::route('studentsgrades.index');
    }
}
