<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return redirect()->route('login');
});

Route::get('login','Auth\LoginController@index')->name('login');

Route::post('authenticate', 'Auth\LoginController@authenticate')->name('authenticate');

Route::middleware('auth')->group(function(){
    
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::prefix('profile')->group(function(){
        Route::get('','Auth\ProfileController@index')->name('profile.index');
        Route::put('info/{user}','Auth\ProfileController@updateInfo')->name('profile.update-info');
        Route::put('password/{user}','Auth\ProfileController@updatePassword')->name('profile.update-password');
    });

    Route::resource('organicUnities','OrganicUnityController');
    Route::resource('departments','DepartmentController');
    Route::resource('delegations','DelegationController');
    Route::resource('repartitions','RepartitionController');
    Route::resource('careers','CareerController');
    Route::resource('academicLevels','AcademicLevelController');
    Route::resource('employees','EmployeeController');
    Route::resource('institutions','InstitutionController');
    Route::resource('courses','CourseController');
    Route::resource('trainings','TrainingController');

    Route::prefix('reports')->group(function(){

        Route::get('index','ReportController@index')->name('reports.index');

        Route::get('download/{report}','ReportController@download')->name('reports.download');
    });
});



