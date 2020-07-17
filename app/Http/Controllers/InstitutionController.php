<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use App\Helpers\InstitutionHelper;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(InstitutionHelper::helperIndex());
        return view(InstitutionHelper::helperIndex(),['institutions' => Institution::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(InstitutionHelper::helperCreate());
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
            'designation'   => 'required|min:3,unique:institutions',
            'address'   =>  'required|min:10,unique:institutions',
            'contact_1' => 'required|min:9,unique:institutions'
        ]);

        $institution = new Institution();
        $institution->designation = $request->designation;
        $institution->address = $request->address;
        $institution->contact_1 = $request->contact_1;
        $institution->contact_2 = $request->contact_2;
        $institution->save();

        session()->flash('success','Instituicao criada com sucesso!');

        return redirect()->route(InstitutionHelper::helperIndex());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return view(InstitutionHelper::helperShow(),['table' => $institution->getAttributes()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        return view(InstitutionHelper::helperCreate(),['institution' => $institution]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        $this->validate($request,[
            'designation'   => 'required|min:3,unique:institutions,' . $institution->id,
            'address'   =>  'required|min:10,unique:institutions,' . $institution->id,
            'contact_1' =>  'required|min:9,unique:institutions,' . $institution->id
        ]);

        $institution->designation = $request->designation;
        $institution->address = $request->address;
        $institution->contact_1 = $request->contact_1;
        $institution->contact_2 = $request->contact_2;
        $institution->save();

        session()->flash('success','Instituicao actualizada com sucesso!');

        return redirect()->route(InstitutionHelper::helperIndex());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();

        session()->flash('success','Instituicao removida com sucesso!');

        return redirect()->back();
    }
}
