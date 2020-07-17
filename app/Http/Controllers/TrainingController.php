<?php

namespace App\Http\Controllers;

use App\Helpers\TrainingHelper;
use App\Models\Course;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(TrainingHelper::helperIndex(),[

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(TrainingHelper::helperCreate(),[
            'courses' => Course::all(['id','designation'])
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
        $this->validate($request, [
            'course_id' => 'required',
            'start_date' => 'required|date',
            'employees' => 'required'
        ]);


        for($i = 0; $i < count($request->employees); $i++){
            $training = new Training();
            $training->course_id = $request->course_id;
            $training->start_date = $request->start_date;
            $training->employee_id = $request->employees[$i];
            $training->finished = $request->hiddenFinished[$i];
            $training->save();
        }

        session()->flash('success','Formacao criada com sucesso!');

        return redirect()->route(TrainingHelper::helperIndex());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $trainings = DB::table('trainings')
        ->join('employees','trainings.employee_id','=','employees.id')
        ->select('employees.name','employees.surname','trainings.finished','trainings.employee_id')
        ->where('course_id', $training->course_id)
        ->where('start_date',$training->start_date)
        ->get();

        return view(TrainingHelper::helperCreate(),[
            'courses' => Course::all(['id','designation']),
            'training' => $training,
            'trainings' => $trainings
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'start_date' => 'required|date'
        ]);

        Training::where('course_id', $training->course_id)
        ->where('start_date', $training->start_date)
        ->delete();

        if(isset($request->employees)){
            for($i = 0; $i < count($request->employees); $i++){
                $training = new Training();
                $training->course_id = $request->course_id;
                $training->start_date = $request->start_date;
                $training->employee_id = $request->employees[$i];
                $training->finished = $request->hiddenFinished[$i];
                $training->save();
            }

            session()->flash('success','Formacao actualizada com sucesso!');

        }else{

            session()->flash('success','Formacao removida com sucesso!');

        }
        
        return redirect()->route(TrainingHelper::helperIndex());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }

    /**
     * Returns the list of all trainings
     * The parameteres can be combined
     * 
     * @param \App\Models\Course $course
     * @param date $start_date
     * @param bool $finished
     * @param bool $central
     * @param int $division_id
     * @param int $employee_id
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function listTrainings($course, $start_date, $finished, $central, $divisionId, $employeeId){

        $course = TrainingHelper::helperCheckNull($course);
        $start_date = TrainingHelper::helperCheckNull($start_date);
        $finished = TrainingHelper::helperCheckNull($finished);
        $central = TrainingHelper::helperCheckNull($central);
        $divisionId = TrainingHelper::helperCheckNull($divisionId);
        $employeeId = TrainingHelper::helperCheckNull($employeeId);

        $trainings = DB::table('trainings')
            ->join('courses','trainings.course_id','=','courses.id')
            ->join('employees','trainings.employee_id','=','employees.id')
            ->select('trainings.*','courses.designation as course','employees.name','employees.surname', 'courses.duration')
            ->where('finished','LIKE',"%{$finished}%")
            ->where('courses.designation','LIKE',"%{$course}%")
            ->where('trainings.start_date','LIKE',"%{$start_date}%")
            ->where('employees.central','LIKE',"%{$central}%")
            ->where('employees.division_id','LIKE',"%{$divisionId}%")
            ->where('employees.id','LIKE',"%{$employeeId}%")
            ->get();

        return response()->json($trainings);

    }
}
