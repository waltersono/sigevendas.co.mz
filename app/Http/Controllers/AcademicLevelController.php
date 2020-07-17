<?php

namespace App\Http\Controllers;

use App\Models\AcademicLevel;
use Illuminate\Http\Request;

class AcademicLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('academicLevels.index',[ 'academicLevels' => AcademicLevel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academicLevels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'designation'   => 'required|min:3,unique:academicLevels'
        ]);

        $academicLevel = new AcademicLevel();
        $academicLevel->designation = $request->designation;
        $academicLevel->save();

        session()->flash('success','Nivel Academico criado com sucesso!');

        return redirect()->route('academicLevels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicLevel  $academicLevel
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicLevel $academicLevel)
    {
        return view('academicLevels.show',['table' => $academicLevel->getAttributes()]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicLevel  $academicLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicLevel $academicLevel)
    {
        return view('academicLevels.create',['academicLevel'  => $academicLevel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicLevel  $academicLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicLevel $academicLevel)
    {
        $this->validate($request,[
            'designation'   => 'required|min:3,unique:academicLevels,' . $academicLevel->id
        ]);

        $academicLevel->designation = $request->designation;
        $academicLevel->save();

        session()->flash('success','Nivel Academico actualizado com sucesso!');

        return redirect()->route('academicLevels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicLevel  $academicLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicLevel $academicLevel)
    {
        $academicLevel->delete();

        session()->flash('success','Nivel Academico remivod com sucesso!');

        return redirect()->back();
    }
}
