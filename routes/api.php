<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('departments','DepartmentController@listDepartments')->name('api.departments');
Route::get('delegations','DelegationController@listDelegations')->name('api.delegations');

Route::get('repartitions/central/{central}','RepartitionController@listRepartitionsFromCentral')->name('api.repartitions.central');
Route::get('repartitions/central/{central}/division/{division}','RepartitionController@listRepartitionsFromDivision')->name('api.repartitions.division');

Route::get('employees/central/{central}','EmployeeController@listEmployeesFromCentral')->name('api.employees.central');
Route::get('employees/department/{department}','EmployeeController@listEmployeesFromDepartment')->name('api.employees.department');
Route::get('employees/delegation/{delegation}','EmployeeController@listEmployeesFromDelegation')->name('api.employees.delegation');
Route::get('employees/{repartition}','EmployeeController@listEmployeesFromRepartition')->name('api.employees.repartition');

Route::get('courses/{designation}/{type}/{match}/{duration}/{institution}/{academicLevel}','CourseController@listCourses')->name('api.courses');

Route::get('trainings/{course}/{startDate}/{finished}/{central}/{divisionId}/{employeeId}','TrainingController@listTrainings')->name('api.trainings');

Route::get('reports/{central}/{divisionId}/{repartitionId}/{reportId}','ReportController@getReport')->name('api.reports');
Route::get('download/reports/{central}/{divisionId}/{repartitionId}/{reportId}','ReportController@downloadReport')->name('api.downbload.reports');
