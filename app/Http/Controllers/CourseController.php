<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Helpers\CourseHelper;
use App\Models\AcademicLevel;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(CourseHelper::helperIndex(),[
            'academicLevels' => AcademicLevel::all()        
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(CourseHelper::helperCreate(),[
            'academicLevels' => AcademicLevel::all(),
            'institutions' => Institution::all(['id','designation'])
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
            'designation' => 'required|min:3,unique:courses',
            'academicLevel_id' => 'required',
            'type'  => 'required',
            'duration' => 'required',
            'institution_id' => 'required'
        ]);

        $course = new Course();
        $course->designation = $request->designation;
        $course->academicLevel_id = $request->academicLevel_id;
        $course->type = $request->type;
        $course->duration = $request->duration;
        $course->institution_id = $request->institution_id;
        $course->content = $request->content;
        $course->save();

        session()->flash('success','Curso criado com sucesso');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view(CourseHelper::helperShow(),['table' => $course->getAttributes()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view(CourseHelper::helperCreate(),[
            'course' => $course,
            'academicLevels' => AcademicLevel::all(),
            'institutions' => Institution::all(['id','designation'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'designation' => 'required|min:3,unique:courses' . $course->id,
            'academicLevel_id' => 'required',
            'type'  => 'required',
            'duration' => 'required',
            'institution_id' => 'required'
        ]);

        $course->designation = $request->designation;
        $course->academicLevel_id = $request->academicLevel_id;
        $course->type = $request->type;
        $course->duration = $request->duration;
        $course->institution_id = $request->institution_id;
        $course->content = $request->content;
        $course->save();

        session()->flash('success','Curso actulizado com sucesso');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        session()->flash('success','Curso removido com sucesso');

        return redirect()->back();
    }

    /**
     * Return the list of courses for search
     * 
     * @param string $designation
     * @param string $type
     * @param string $match
     * @param int $duration
     * @param string $institution
     * @param string $academicLevel
     * 
     * @return \Illuminate\Http\Response
     */
    public function listCourses($designation = null, $type = null, $match = '>' ,$duration = 0, $institution = null, $academicLevel = null){
        
        $designation = CourseHelper::helperCheckNull($designation);
        $type = CourseHelper::helperCheckNull($type);
        $match = ($match == "%%") ? ">" : $match;
        $duration = ($duration == "%%") ? 0 : $duration;
        $institution = CourseHelper::helperCheckNull($institution);
        $academicLevel = CourseHelper::helperCheckNull($academicLevel);

        $courses = DB::table('courses')
            ->join('institutions','courses.institution_id','=','institutions.id')
            ->join('academic_levels','courses.academicLevel_id','=','academic_levels.id')
            ->select('courses.id','courses.designation','courses.type','courses.duration','institutions.designation as institution','academic_levels.designation as academicLevel')
            ->where('courses.designation','LIKE',"{$designation}%")
            ->where('courses.type','LIKE',"{$type}%")
            ->where('courses.duration',$match,"{$duration}")
            ->where('institutions.designation','LIKE',"{$institution}%")
            ->where('academic_levels.designation','LIKE',"{$academicLevel}%")
            ->get();

        return response()->json($courses);
    }


}
