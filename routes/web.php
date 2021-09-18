<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\PortalOperation;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentOperation;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', [AdminController::class, 'index'] )->name('dashboard');

Route::get('/exam/subject', [AdminController::class, 'Exam_Subject']);
Route::post('/add_new_subject', [AdminController::class, 'Add_New_Subject']);
Route::put('/subject/{id}', [AdminController::class, 'Update_Subject']);
Route::delete('/delete/{id}', [AdminController::class, 'Delete_Subject']);
Route::get('/subject_status/{id}', [StudentOperation::class, 'Subject_Status']);

// manage exam routes

Route::get('/exam', [AdminController::class, 'Exam_List']);
Route::post('/add_exam', [AdminController::class, 'Add_New_Exam']);
Route::put('/editExam/{id}', [AdminController::class, 'Update_Exam']);
Route::delete('/deleteExam/{id}', [AdminController::class, 'Delete_Exam']);
Route::get('/exam_status/{id}', [AdminController::class, 'Exam_Status']);


//  Exam Question Routes

Route::get('/exam/question/{id}', [AdminController::class, 'Exam_Question']);
Route::post('/add/new/question', [AdminController::class, 'Add_New_Question']);
Route::get('/exam_question_status/{id}', [AdminController::class, 'Exam_Question_Status']);
Route::get('/edit/exam/question/{id}', [AdminController::class, 'Edit_Exam_Question']);
Route::post('/update/exam/question', [AdminController::class, 'Update_Exam_Question']);
Route::delete('/deleteExamStatus/{id}', [AdminController::class, 'Delete_Exam_Question']);





// manage Student routes

Route::get('/student', [AdminController::class, 'Student_List']);
Route::post('/add_student', [AdminController::class, 'Add_New_Student']);
Route::get('/edit/Student/{id}', [AdminController::class, 'Edit_Student'])->name('edit.student');
Route::post('/update/Student/{id}', [AdminController::class, 'Update_Student'])->name('update.student');
Route::delete('/deleteStudent/{id}', [AdminController::class, 'Delete_Student']);
Route::get('/student_status/{id}', [AdminController::class, 'Student_Status']);


// manage Portal routs

Route::get('/portal', [AdminController::class, 'Portal_List']);
Route::post('/add_portal', [AdminController::class, 'Add_New_Portal']);
Route::put('/editPortal/{id}', [AdminController::class, 'Update_Portal']);
Route::delete('/deletePortal/{id}', [AdminController::class, 'Delete_Exam']);
Route::get('/portal_status/{id}', [AdminController::class, 'Portal_Status']);


// Portal routes
Route::get('/portal/signIn', [PortalController::class, 'Portal_SignIn']);
Route::get('/portal/signUp', [PortalController::class, 'Portal_signUp']);
Route::post('/check/login', [PortalController::class, 'Check_Login'])->name('check.login');
Route::post('/save/signUp', [PortalController::class, 'Save_Portal_SignUp'])->name('save.signUp');
Route::get('/student/exam/form/{id}', [PortalController::class, 'Student_Exam_form']);
Route::post('/save/student/exam/form', [PortalController::class, 'Save_Student_Exam_Form']);
Route::get('/student/info/print/{id}', [PortalController::class, 'Print_Info']);
Route::get('/portal/logout', [PortalController::class, 'LogOut']);

Route::get('/portal_dashboard', [PortalOperation::class, 'Portal_Dashboard']);


// student routs  
Route::get('/student/signIn', [StudentController::class, 'Student_SignIn']);
Route::post('/check/std/login', [StudentController::class, 'Check_Student_SignIn']);
Route::get('/join/exam/{id}', [StudentOperation::class, 'Join_Exam']);

Route::post('/submit/student/question', [StudentOperation::class, 'Submit_Student_Question']);
Route::get('/student/show_result/{id}', [StudentOperation::class, 'Show_Exam_Result']);

Route::get('/student_dashboard', [StudentOperation::class, 'Student_Dashboard']);
Route::get('/student/exam', [StudentOperation::class, 'Student_exam']);
Route::get('/student/logout', [StudentOperation::class, 'Student_LogOut']);
