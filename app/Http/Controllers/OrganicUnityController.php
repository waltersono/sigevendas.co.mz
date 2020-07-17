<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OrganicUnity;
use Illuminate\Http\Request;

class OrganicUnityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organicUnities.index',[
            'organicUnities' => OrganicUnity::all() 
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organicUnities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'designation'  =>  'required|min:3|unique:organic_unities'
        ]);

        $organic_unity = new OrganicUnity();
        $organic_unity->designation = $request->designation;
        $organic_unity->save();

        session()->flash('success','Unidade Organica criada com sucesso!');

        return redirect()->route('organicUnities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganicUnity  $organicUnity
     * @return \Illuminate\Http\Response
     */
    public function show(OrganicUnity $organicUnity)
    {
        $table = $organicUnity->getAttributes();

        return view('organicUnities.show', ['table' => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganicUnity  $organicUnity
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganicUnity $organicUnity)
    {
        return view('organicUnities.create',[
            'organicUnity' => $organicUnity,
            'employees' => Employee::where("central",1)->whereNull('division_id')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganicUnity  $organicUnity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganicUnity $organicUnity)
    {
        $this->validate($request, [
            'designation'  =>  'required|min:3,' . $organicUnity->id
        ]);

        $organic_unity = OrganicUnity::find($organicUnity->id);
        $organic_unity->designation = $request->designation;

        $organic_unity->general_manager_id = $request->general_manager_id;
        $organic_unity->deputy_director_id = $request->deputy_director_id;
        $organic_unity->save();

        session()->flash('success','Unidade Organica actualizada com sucesso!');

        return redirect()->route('organicUnities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganicUnity  $organicUnity
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganicUnity $organicUnity)
    {
        $organicUnity->delete();
        session()->flash('success','Unidade Organica removida com sucesso!');

        return redirect()->back();
    }
}
