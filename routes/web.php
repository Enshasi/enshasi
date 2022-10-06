<?php

use App\Http\Controllers\Auth\LoginController ;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\library\libraryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
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

//Auth::routes();

Route::get('/', [HomeController::class ,'index'])->name('selection');


Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}',[LoginController::class , 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login',[LoginController::class , 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class , 'logout'])->name('logout');
});


// Group Lang
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth']
    ], function(){
//    Route::get('/', function () {
//        return view('dashboard');
//    });

    //Auth
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    //grade
    Route::get('/grades', 'App\Http\Controllers\Grades\GradeController@index');
    Route::post('/grades/store', 'App\Http\Controllers\Grades\GradeController@store');
    Route::post('grade/update', 'App\Http\Controllers\Grades\GradeController@update');
    Route::post('grade/destroy', 'App\Http\Controllers\Grades\GradeController@destroy');
    //classRoom

    Route::get('classrooms/index', 'App\Http\Controllers\Classrooms\ClassroomController@index');
    Route::post('Classrooms/store', 'App\Http\Controllers\Classrooms\ClassroomController@store');
    Route::post('Classrooms/update', 'App\Http\Controllers\Classrooms\ClassroomController@update');
    Route::post('Classrooms/destroy', 'App\Http\Controllers\Classrooms\ClassroomController@destroy');
    Route::post('Classroom/deleteAll', 'App\Http\Controllers\Classrooms\ClassroomController@deleteAll');
    Route::post('Classroom/Filter_Classes', 'App\Http\Controllers\Classrooms\ClassroomController@Filter_Classes');

    ///////
    Route::get('classes/{id}', 'App\Http\Controllers\sections\SectionsController@getclasses');

    //sections
    Route::get('Sections/index', 'App\Http\Controllers\sections\SectionsController@index')->name('Sections.index');
    Route::post('Sections/store', 'App\Http\Controllers\sections\SectionsController@store');
    Route::post('Sections/update', 'App\Http\Controllers\sections\SectionsController@update');

    Route::post('Sections/destroy', 'App\Http\Controllers\sections\SectionsController@destroy');


    //Teachers
    Route::get('Teachers', 'App\Http\Controllers\Teachers\TeachersController@index')->name('Teachers.index');
    Route::get('Teachers/create', 'App\Http\Controllers\Teachers\TeachersController@create');
    Route::post('Teachers/store', 'App\Http\Controllers\Teachers\TeachersController@store');
    Route::get('Teachers/edit/{id}', 'App\Http\Controllers\Teachers\TeachersController@edit');
    Route::post('Teachers/update', 'App\Http\Controllers\Teachers\TeachersController@update');
    Route::post('Teachers/destroy', 'App\Http\Controllers\Teachers\TeachersController@destroy');


//    students
    Route::get('students/create', 'App\Http\Controllers\students\StudentController@create');
    Route::get('student/index', 'App\Http\Controllers\students\StudentController@index')->name('Students.index');
    Route::post('students/store', 'App\Http\Controllers\students\StudentController@store');
    Route::get('students/edit/{id}', 'App\Http\Controllers\students\StudentController@edit');
    Route::post('students/update', 'App\Http\Controllers\students\StudentController@update');
    Route::post('students/destroy', 'App\Http\Controllers\students\StudentController@destroy');
    Route::get('students/show/{id}', 'App\Http\Controllers\students\StudentController@show');

    Route::post('Upload_attachment/', 'App\Http\Controllers\students\StudentController@Upload_attachment');
    Route::get('Download_attachment/{studentname}/{filename}', 'App\Http\Controllers\students\StudentController@Download_attachment');
    Route::post('Delete_attachment', 'App\Http\Controllers\students\StudentController@Delete_attachment');
//student Promotions

    Route::get('students/Promotions', 'App\Http\Controllers\students\PromotionController@index');
    Route::post('Promotion/store', 'App\Http\Controllers\students\PromotionController@store');
    Route::get('Promotion/create', 'App\Http\Controllers\students\PromotionController@create');
    Route::post('Promotion/destroy', 'App\Http\Controllers\students\PromotionController@destroy');
    //student Graducted
    Route::get('Graduated/index', 'App\Http\Controllers\students\GraduatedController@index');
    Route::get('Graduated/create', 'App\Http\Controllers\students\GraduatedController@create');
    Route::post('Graduated/update', 'App\Http\Controllers\students\GraduatedController@update');
    Route::post('Graduated/destroy', 'App\Http\Controllers\students\GraduatedController@destroy');
    Route::post('Graduated/store', 'App\Http\Controllers\students\GraduatedController@store');


    //complete use relation
    Route::get('/Get_classrooms/{id}', 'App\Http\Controllers\students\StudentController@Get_classrooms');
    Route::get('/Get_Sections/{id}', 'App\Http\Controllers\students\StudentController@Get_Sections');
   //Fees Fees/create  Fees/destroy  Fees/store
    Route::get('fees/index', 'App\Http\Controllers\Fees\FeesController@index');
    Route::get('Fees/create', 'App\Http\Controllers\Fees\FeesController@create');
    Route::get('Fees/edit/{id}', 'App\Http\Controllers\Fees\FeesController@edit');
    Route::post('Fees/store', 'App\Http\Controllers\Fees\FeesController@store');
    Route::post('Fees/update', 'App\Http\Controllers\Fees\FeesController@update');
    Route::post('Fees/destroy', 'App\Http\Controllers\Fees\FeesController@destroy');
    //Fess Invoices
    Route::get('Fees_Invoices/show/{id}', 'App\Http\Controllers\Fees\FeesInvoicesController@show');
    Route::post('Fees_Invoices/store', 'App\Http\Controllers\Fees\FeesInvoicesController@store');
    Route::get('Fees_Invoices/index', 'App\Http\Controllers\Fees\FeesInvoicesController@index');
    Route::get('Fees_Invoices/edit/{id}', 'App\Http\Controllers\Fees\FeesInvoicesController@edit');
    Route::post('Fees_Invoices/update', 'App\Http\Controllers\Fees\FeesInvoicesController@update');
    Route::post('Fees_Invoices/destroy', 'App\Http\Controllers\Fees\FeesInvoicesController@destroy');
    //receipt
    Route::get('receipt_students/index', 'App\Http\Controllers\Receipt\ReceiptStudentController@index');
    Route::get('receipt_students/show/{id}', 'App\Http\Controllers\Receipt\ReceiptStudentController@show');
    Route::post('receipt_students/store', 'App\Http\Controllers\Receipt\ReceiptStudentController@store');

    Route::get('receipt_students/edit/{id}', 'App\Http\Controllers\Receipt\ReceiptStudentController@edit');
    Route::post('receipt_students/update', 'App\Http\Controllers\Receipt\ReceiptStudentController@update');
    Route::post('receipt_students/destroy', 'App\Http\Controllers\Receipt\ReceiptStudentController@destroy');


    //ProcessingFee
    Route::get('ProcessingFee/index', 'App\Http\Controllers\ProcessingFeeController@index');
    Route::get('ProcessingFee/show/{id}', 'App\Http\Controllers\ProcessingFeeController@show');
    Route::post('ProcessingFee/store', 'App\Http\Controllers\ProcessingFeeController@store');
    Route::get('ProcessingFee/edit/{id}', 'App\Http\Controllers\ProcessingFeeController@edit');
    Route::post('ProcessingFee/update', 'App\Http\Controllers\ProcessingFeeController@update');
    Route::post('ProcessingFee/destroy', 'App\Http\Controllers\ProcessingFeeController@destroy');

    //Payment
    Route::get('Payment/index', 'App\Http\Controllers\PaymentController@index');
    Route::get('Payment/show/{id}', 'App\Http\Controllers\PaymentController@show');
    Route::post('Payment/store', 'App\Http\Controllers\PaymentController@store');
    Route::get('Payment/edit/{id}', 'App\Http\Controllers\PaymentController@edit');
    Route::post('Payment/update', 'App\Http\Controllers\PaymentController@update');
    Route::post('Payment/destroy', 'App\Http\Controllers\PaymentController@destroy');

    //Attendance
    Route::get('Attendance/index', 'App\Http\Controllers\AttendanceController@index');
    Route::get('Attendance/show/{id}', 'App\Http\Controllers\AttendanceController@show');
    Route::post('Attendance/store', 'App\Http\Controllers\AttendanceController@store');
    Route::get('Attendance/edit/{id}', 'App\Http\Controllers\AttendanceController@edit');
    Route::post('Attendance/update', 'App\Http\Controllers\AttendanceController@update');
    Route::post('Attendance/destroy', 'App\Http\Controllers\AttendanceController@destroy');
    //Subject
    Route::get('Subject/index', 'App\Http\Controllers\SubjectController@index');
    Route::get('Subject/create', 'App\Http\Controllers\SubjectController@create');
    Route::post('Subject/store', 'App\Http\Controllers\SubjectController@store');
    Route::get('Subject/edit/{id}', 'App\Http\Controllers\SubjectController@edit');
    Route::post('Subject/update', 'App\Http\Controllers\SubjectController@update');
    Route::post('Subject/destroy', 'App\Http\Controllers\SubjectController@destroy');



    //Exams
    Route::get('Quizzes/index', 'App\Http\Controllers\Quizze\QuizzeController@index');
    Route::get('Quizzes/create', 'App\Http\Controllers\Quizze\QuizzeController@create');
    Route::post('Quizzes/store', 'App\Http\Controllers\Quizze\QuizzeController@store');
    Route::get('Quizzes/edit/{id}', 'App\Http\Controllers\Quizze\QuizzeController@edit');
    Route::post('Quizzes/update', 'App\Http\Controllers\Quizze\QuizzeController@update');
    Route::post('Quizzes/destroy', 'App\Http\Controllers\Quizze\QuizzeController@destroy');

    //Exams
    Route::get('Questions/index', 'App\Http\Controllers\Questions\QuestionController@index');
    Route::get('Questions/create', 'App\Http\Controllers\Questions\QuestionController@create');
    Route::post('Questions/store', 'App\Http\Controllers\Questions\QuestionController@store');
    Route::get('Questions/edit/{id}', 'App\Http\Controllers\Questions\QuestionController@edit');
    Route::post('Questions/update', 'App\Http\Controllers\Questions\QuestionController@update');
    Route::post('Questions/destroy', 'App\Http\Controllers\Questions\QuestionController@destroy');

    //Online_classes

    Route::get('Online_classes/index', 'App\Http\Controllers\Online_Classe\OnlineClasseController@index');
    Route::get('Online_classes/create', 'App\Http\Controllers\Online_Classe\OnlineClasseController@create');
    Route::post('Online_classes/store', 'App\Http\Controllers\Online_Classe\OnlineClasseController@store');
    Route::post('Online_classes/destroy', 'App\Http\Controllers\Online_Classe\OnlineClasseController@destroy');
    Route::get('indirect/create', 'App\Http\Controllers\Online_Classe\OnlineClasseController@indirectCreate')->name('indirect.create');
    Route::post('indirect/store', 'App\Http\Controllers\Online_Classe\OnlineClasseController@storeIndirect')->name('indirect.store');

    //library
    Route::get('library/index', 'App\Http\Controllers\library\libraryController@index');
    Route::get('library/create', 'App\Http\Controllers\library\libraryController@create');
    Route::post('library/store', 'App\Http\Controllers\library\libraryController@store');
    Route::get('library/edit/{id}', 'App\Http\Controllers\library\libraryController@edit');
    Route::post('library/update', 'App\Http\Controllers\library\libraryController@update');
    Route::post('library/destroy', 'App\Http\Controllers\library\libraryController@destroy');
    Route::post('library/downloadAttachment/{filename}', 'App\Http\Controllers\library\libraryController@download');


    Route::get('settings/index', 'App\Http\Controllers\settings\SettingController@index');
    Route::post('settings/update', 'App\Http\Controllers\settings\SettingController@update');


    //Livewirreceipt_
    Route::view('add_parent','livewire.show_Form')->name('add_parent');




});
