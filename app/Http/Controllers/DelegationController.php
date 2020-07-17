<?php

namespace App\Http\Controllers;

use App\Models\Delegation;
use App\Models\Employee;
use Illuminate\Http\Request;

class DelegationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('delegations.index',[ 'delegations' => Delegation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delegations.create');
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
            'designation'   => 'required|min:3,unique:delegations'
        ]);

        $delegation = new Delegation();
        $delegation->designation = $request->designation;
        $delegation->save();

        session()->flash('success','Delegacao criado com sucesso!');

        return redirect()->route('delegations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delegation  $delegation
     * @return \Illuminate\Http\Response
     */
    public function show(Delegation $delegation)
    {
        $table = $delegation->getAttributes();

        return view('delegations.show',['table' => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delegation  $delegation
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegation $delegation)
    {
        return view('delegations.create',[
            'delegation'  =>  $delegation,
            'employees' => Employee::where("central",0)->where('division_id',$delegation->id)->whereNull('repartition_id')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delegation  $delegation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delegation $delegation)
    {
        $this->validate($request,[
            'designation'   => 'required|min:3,unique:delegations,' . $delegation->id
        ]);

        $delegation->designation = $request->designation;
        $delegation->deputy_id = $request->deputy_id;
        $delegation->save();

        session()->flash('success','Delegacao actualizada com sucesso!');

        return redirect()->route('delegations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delegation  $delegation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegation $delegation)
    {
        $delegation->delete();

        session()->flash('success','Delegacao removida com sucesso!');

        return redirect()->back();
    }

    /**
     * 
     */
    public function listDelegations(){
        return response()->json(Delegation::all(['id','designation']));
    }
}
