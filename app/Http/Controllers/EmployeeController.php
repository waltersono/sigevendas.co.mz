<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Helpers\EmployeeHelper;
use App\Models\AcademicLevel;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Delegation;
use App\Models\Department;
use App\Models\Repartition;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(EmployeeHelper::helperIndex());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(EmployeeHelper::helperCreate(),[
            'careers' => Career::all(),
            'academicLevels' => AcademicLevel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->id_number = $request->id_number;
        $employee->nuit = $request->nuit;
        $employee->email = $request->email;
        $employee->contact_1 = $request->contact_1;
        $employee->contact_2 = $request->contact_2;
        $employee->career_id  = $request->career_id;
        $employee->academicLevel_id = $request->academicLevel_id;
        $employee->central = $request->central;
        $employee->division_id = $request->division_id;
        $employee->repartition_id = $request->repartition_id;
        
        if(isset($request->photo_file)){
            $employee->photo_path = $request->photo_file->store('employees_photos');
        }

        $employee->save();

        session()->flash('success','Funcionario adicionado com sucesso!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view(EmployeeHelper::helperShow(),['table' => $employee->getAttributes()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view(EmployeeHelper::helperCreate(),[
            'employee' => $employee,
            'careers' => Career::all(['id','designation']),
            'academicLevels' => AcademicLevel::all(['id','designation'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {

        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->id_number = $request->id_number;
        $employee->nuit = $request->nuit;
        $employee->email = $request->email;
        $employee->contact_1 = $request->contact_1;
        $employee->contact_2 = $request->contact_2;
        $employee->career_id  = $request->career_id;
        $employee->academicLevel_id = $request->academicLevel_id;
        $employee->central = $request->central;
        $employee->division_id = $request->division_id;
        $employee->repartition_id = $request->repartition_id;
        
        if(isset($request->photo_file)){
            $employee->photo_path = $request->photo_file->store('employees_photos');
        }

        $employee->save();

        session()->flash('success','Funcionario actualizado com sucesso!');

        return redirect()->route(EmployeeHelper::helperIndex());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        session()->flash('success','Funcionario removido com sucesso!');

        return redirect()->back();
    }

    /**
     * Return a json data containing a list of all employees from a given repartition
     * 
     * @param App\Models\Repartition $repartition
     * @return \Illuminate\Http\Response
     */
    public function listEmployeesFromRepartition(Repartition $repartition){
        return response()->json(Employee::where("repartition_id", $repartition->id)->get());
    }

    /**
     * Return a json data containing a list of all employees from a given department
     * 
     * @param App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function listEmployeesFromDepartment(Department $department){
        return response()->json(
            Employee::where("central",1)->where("division_id", $department->id)->get()
        );
    }

    /**
     * Return a json data containing a list of all employees from a given department
     * 
     * @param App\Models\Delegation $delegation
     * @return \Illuminate\Http\Response
     */
    public function listEmployeesFromDelegation(Delegation $delegation){
        return response()->json(
            Employee::where("central",0)->where("division_id", $delegation->id)->get()
        );
    }

    /**
     * Return a json data containing a list of all employees from a central
     * 
     * @param $central
     * @return \Illuminate\Http\Response
     */
    public function listEmployeesFromCentral($central){
        return response()->json(
            Employee::where("central",$central)->get()
        );
    }
}
