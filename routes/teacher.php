<?php

// use App\Models\auth;
use App\Http\Controllers\Dashboard\StudentController;


use App\Http\Controllers\Teachers\QuestionsController;
use App\Http\Controllers\Teachers\quezzController;
use App\Models\Quizze;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        // $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        // $data['count_sections']= $ids->count();
        // $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();

       $ids = DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
       $count_sections =  $ids->count();
       $count_students = DB::table('students')->whereIn('section_id',$ids)->count();
        return view('page.Teachers.dashboard.dashboard',compact('count_sections' ,'count_students'));
        // return view('page.Teachers.dashboard.dashboard');
    });
    Route::get('student' , [StudentController::class , 'index'])->name('student.index');
    Route::get('section' , [StudentController::class , 'Section'])->name('section');
    Route::post('attendance',[StudentController::class , 'attendance'])->name('attendance');
    Route::post('edit_attendance',[StudentController::class , 'editAttendance'])->name('attendance.edit');
    Route::get('attendance_report',[StudentController::class , 'attendanceReport'])->name('attendance.report');
    Route::post('attendance_search',[StudentController::class , 'attendancesearch'])->name('attendance.search');
    Route::resource('quizzes' , quezzController::class);
     Route::resource("Questions" , QuestionsController::class);
});

