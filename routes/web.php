<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Managecontroller;

use App\Http\Controllers\Auth\ParentLoginController;
use App\Http\Controllers\Auth\TeacherLoginController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\Auth\LogoutStudentController;
use App\Http\Controllers\Auth\LogoutParentController;
use App\Http\Controllers\Auth\LogoutTeacherController;
use App\Http\Controllers\Teachers\dashboard\StudentController;
use App\Http\Controllers\Teachers\dashboard\QzsController;
use App\Http\Controllers\Teachers\dashboard\QuestionController;
use App\Http\Controllers\Students\dashboard\ExamController;
use App\Http\Controllers\Parents\dashboard\ProController;
use App\Http\Controllers\Parents\dashboard\AttendenceController;





use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\RecieptStudentController;
use App\Http\Controllers\ProcessFeesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PaymentController;



use App\Models\Teacher;
use App\Models\Student;
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
return view('selection');
});


Auth::routes();

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    
Route::group(
    [
        'middleware' =>'auth'
    ],   function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');


});

///admin profile
Route::get('show_profile','ProfileController@show')->name('admin_profile');
Route::put('update_profile/{id}','ProfileController@update')->name('update_admin');


//==============================students============================
Route::get('/student_login_form', 'Auth\StudentLoginController@showLoginForm');
Route::post('/student_login', 'Auth\StudentLoginController@login')->name('student_login_name');
Route::post('/logout_student', 'Auth\LogoutStudentController@logout');

//==============================parents============================

Route::get('/parent_login_form', 'Auth\ParentLoginController@showLoginForm');
Route::post('/parent_login', 'Auth\ParentLoginController@login')->name('parent_login_name');
Route::post('/logout_parent', 'Auth\LogoutParentController@logout');
//==============================teachers============================




Route::get('/teacher_login_form', 'Auth\TeacherLoginController@showLoginForm');
Route::post('/teacher_login', 'Auth\TeacherLoginController@login')->name('teacher_login_name');
Route::post('/logout_teacher', 'Auth\LogoutTeacherController@logout');


    Route::group(['prefix' =>'students','middleware' =>'assign.guard:student,student_login_form'], function () {Route::get('/dashboard',function(){return view("auth.students.dashboard");});});

    Route::group(['prefix' =>'parents','middleware' =>'assign.guard:parent,parent_login_form'], function () { Route::get('/dashboard',function(){return view("auth.parents.dashboard");});});

    Route::group(['prefix' =>'teachers','middleware' =>'assign.guard:teacher,teacher_login_form'], function () {
                Route::get('/dashboard',function(){
                $ids=Teacher::findorfail(auth()->user()->id)->sections()->pluck('Section_Id');
                $count_sections=$ids->count();
                $count_students=Student::whereIn('Section_Id',$ids)->count();
                return view("auth.teachers.dashboard",compact('count_sections','count_students'));
        });
    });


            ########################################### =>Teachers=> ###############################################
            Route::group([ 'prefix' =>'teachers','namespace'=>'Teachers\dashboard','middleware' =>'assign.guard:teacher'],function(){
             Route::get('students_t','StudentController@stds')->name('students_t');
             Route::get('sections','StudentController@sections')->name('sections');
             Route::post('attendence','StudentController@attendence')->name('attendence');
             Route::post('edit_attendence','StudentController@edit_attendence')->name('edit_attendence');
             Route::get('/attendence_reports','StudentController@attendence_reports')->name('attendence_reports');
             Route::post('attendence_search','StudentController@attendence_search')->name('attendence_search');
             Route::get('Quizs_show','QzsController@index')->name('Quizs');
             Route::get('َQzs/{id}','QzsController@show')->name('show_question');
             Route::get('َQzs/edit/{id}','QzsController@edit')->name('edit_quiz');
             Route::put('َQzs/update','QzsController@update')->name('update_quiz');
             Route::delete('َQzs/destroy/{id}','QzsController@destroy')->name('delete_quiz');
             Route::get('َQzs_create','QzsController@create')->name('Qzs.create');
             Route::post('َQzs/submit','QzsController@store')->name('Qzs_store');
             Route::get('show_results/{id}','QzsController@show_results')->name('show_results');
             Route::get('show/{id}','QuestionController@show')->name('show');
             Route::get('show_question/{id}','QuestionController@show_questions')->name('show_question');
             Route::post('Question/store','QuestionController@store')->name('Quest.store');
             Route::put('Question/update','QuestionController@update')->name('Quest.update');
             Route::post('Question/destroy','QuestionController@destroy')->name('Ques.destroy');
             Route::get('show_profile','ProfileController@show')->name('teacher_profile');
             Route::put('update_profile/{id}','ProfileController@update')->name('update_teacher');
            });

            ########################################### =>Students=> ###############################################
            Route::group([ 'prefix' =>'students','namespace'=>'Students\dashboard','middleware' =>'assign.guard:student'],function(){
            Route::resource('Exams_students','ExamController');
            Route::resource('profile','ProfileController');
            Route::get('sbjects','SbjectsController@index')->name('sbjs');
            Route::get('show_profile','ProfileController@show')->name('student_profile');
            Route::put('update_profile/{id}','ProfileController@update')->name('update_student');

            });

            ########################################### =>Parents=> ###############################################
            Route::group([ 'prefix' =>'parents','namespace'=>'Parents\dashboard','middleware' =>'assign.guard:parent'],function(){
            Route::resource('Parents','ParentController');
            Route::get('result_for_parents/{id}','ParentController@show')->name('result_for_parents');
            Route::resource('Attendence_p','AttendenceController');
            Route::resource('fee_p','FeeController');
            Route::resource('profile','proController');
            Route::get('show_profile','ProfileController@show')->name('parent_profile');
            Route::put('update_profile/{id}','ProfileController@update')->name('update_parent');
            });
    

            ########################################### =>Grades=> ################################################
            Route::resource('grade_list', 'GradeController');
            ########################################### =>Classrooms=> ############################################
            Route::resource('classroom', 'ClassroomController');
            Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
            Route::get('filter_grades', 'ClassroomController@filter_grades')->name('filter_grades');
            Route::get('class/{id}', 'ClassroomController@getclass');
            ########################################### =>Section=> ################################################
            Route::resource('section', 'SectionController');
            ########################################### =>Parents Admin=> ###########################################
            Route::view('add_parent','livewire.show-form')->name('add_parent');
            ########################################### =>Teacher Adnmin=> ##########################################
            Route::resource('Teacher', 'TeacherController');
            ########################################### =>Student Admin=> ###########################################
            Route::resource('students', 'StudentController');
            Route::get('class_student/{id}', 'StudentController@getclass_student');
            Route::get('section_student/{id}', 'StudentController@getsection_student');
            ########################################### =>Promotion=> ################################################
            Route::resource('promotion', 'PromotionController');
            ########################################### =>Graduates=> ################################################
            Route::resource('Graduates', 'GraduateController');
             ########################################### =>Payment=> ################################################
            Route::resource('Payment', 'PaymentController');
            ########################################### =>Fees=> #####################################################
            Route::resource('Fees', 'FeeController');
            Route::get('Classroom_fee_id/{id}', 'FeeController@get_class_fee_student');
            ########################################### =>SubjectController@class=> ##################################
            Route::get('classes_subject/{id}', 'SubjectController@get_class_subject');
            ########################################### =>Fees_Invoices=> ############################################
            Route::resource('Fees_Invoices', 'FeeInvoiceController');
            ########################################### =>receipt_students=> ##########################################
            Route::resource('receipt_students', 'RecieptStudentController');
            ########################################### =>ProcessFees=> ###############################################
            Route::resource('ProcessFees', 'ProcessFeesController');
            ########################################### =>Attendence=> ################################################
            Route::resource('Attendence', 'AttendenceController');
            ########################################### =>Subjects=> ##################################################
            Route::resource('Subjects', 'SubjectController');
            ########################################### =>Exams=> #####################################################
            Route::resource('Exams', 'ExamController');
            ########################################### =>Quizs=> #####################################################
            Route::resource('Quizs', 'QuizController');
            ########################################### =>Questions=> #################################################
            Route::resource('Questions', 'QuestionController');
            Route::get('qs/{id}','QuestionController@show')->name('qs_show');
            ########################################### =>Library=> ####################################################
            Route::resource('Library', 'LibraryController');
            ########################################### =>Settings=> ####################################################
            Route::get('settings', 'SettingController@index');
            Route::get('settings_update', 'SettingController@update');
 });  



            