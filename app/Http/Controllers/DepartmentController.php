<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departments.index',[
            'departments' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
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
            'designation'   =>  'required|min:3,unique:departments'
        ]);

        $department = new Department();
        $department->designation = $request->designation;
        $department->save();

        session()->flash('success','Departamento criado com sucesso!');

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $table = $department->getAttributes();

        return view('departments.show', ['table' => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.create',[
            'department' => $department,
            'employees' => Employee::where("central",1)->where('division_id',$department->id)->whereNull('repartition_id')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'designation'   =>  'required|min:3,unique:departments,' . $department->id
        ]);

        $department->designation = $request->designation;
        $department->head_of_department_id = $request->head_of_department_id;
        $department->save();

        session()->flash('success','Departamento actualizado com sucesso!');

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        
        session()->flash('success','Departamento removido com sucesso!');

        return redirect()->back();
    }

    /**
     * 
     */
    public function listDepartments(){
        return response()->json(Department::all(['id','designation']));
    }
}
