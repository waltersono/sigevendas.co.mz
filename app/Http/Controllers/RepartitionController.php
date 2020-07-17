<?php

namespace App\Http\Controllers;

use App\Helpers\RepartitionHelper\RepartitionHelper;
use App\Models\Repartition;
use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
/**
 * Manages the 
 * 
 * @company: National Institute Of Social Protection Mozambique
 * @author Walter Sono
 * @email tec.waltersono@gmail.com
 */
class RepartitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(RepartitionHelper::helperIndex(),['repartitions' => Repartition::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(RepartitionHelper::helperCreate());
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
            'designation' => 'required|min:2,unique:repartitions',
            'central'  => 'required',
            'division_id' => 'required'
        ]);

        $repartition = new Repartition();
        $repartition->designation = $request->designation;
        $repartition->central = $request->central;
        $repartition->division_id = $request->division_id;
        $repartition->save();

        session()->flash('success','Reparticao criada com  sucesso!');

        return redirect()->route(RepartitionHelper::helperIndex());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repartition  $repartition
     * @return \Illuminate\Http\Response
     */
    public function show(Repartition $repartition)
    {
        return view(RepartitionHelper::helperShow(), ['table' => $repartition->getAttributes()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repartition  $repartition
     * @return \Illuminate\Http\Response
     */
    public function edit(Repartition $repartition)
    {
        return view(RepartitionHelper::helperCreate(),[
            'repartition' => $repartition,
            'employees' => Employee::where('central',$repartition->central)
            ->where('division_id',$repartition->division_id)
            ->where('repartition_id', $repartition->id)
            ->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repartition  $repartition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repartition $repartition)
    {
        $this->validate($request,[
            'designation' => 'required|min:2,unique:repartitions,' . $repartition->id,
            'central'  => 'required',
            'division_id' => 'required'
        ]);

        $repartition->designation = $request->designation;
        $repartition->head_of_repartition_id = $request->employee_id;
        $repartition->central = $request->central;
        $repartition->division_id = $request->division_id;
        $repartition->save();

        session()->flash('success','Reparticao actualizado com  sucesso!');

        return redirect()->route(RepartitionHelper::helperIndex());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repartition  $repartition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repartition $repartition)
    {
        $repartition->delete();

        session()->flash('success','Reparticao removida com sucesso!');

        return redirect()->back();
    }

    /**
     * Return the list of Repartitions for search
     * 
     * @param bool $central
     * @param int $division
     * @return \Illuminate\Http\JsonResponse
     */
    public function listRepartition($central, $division){


        
    }

    /**
     * Returns the list of all Employees from a central or not
     * 
     * @param bool $central
     * @return \Illuminate\Http\JsonResponse
     */
    public function listRepartitionsFromCentral($central){
        $repartitions = null;

        if($central == 1){

            $repartitions = RepartitionHelper::helperQueryEmployeesFromCentral($central,"departments");

        }elseif($central == 0){

            $repartitions = RepartitionHelper::helperQueryEmployeesFromCentral($central,"delegations");

        }
        
        return response()->json(
            $repartitions
        );
    }

    /**
     * Returns the list of all Employees from a given division
     * 
     * @param bool $central
     * @param int $division
     * @return \Illuminate\Http\JsonResponse
     */
    public function listRepartitionsFromDivision($central, $division_id){

        $repartitions = null;

        if($central == 1){
            $repartitions = RepartitionHelper::helperQueryEmployeesFromDivision($central, $division_id, "departments");
        }elseif($central == 0){
            $repartitions = RepartitionHelper::helperQueryEmployeesFromDivision($central, $division_id, "delegations");
        }

        return response()->json(
            $repartitions
        );
    }
}
