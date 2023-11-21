<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\setupManagement\DesignationController;
use App\Http\Controllers\backend\setupManagement\FeeCategoryAmountController;
use App\Http\Controllers\backend\setupManagement\FeeCategoryController;
use App\Http\Controllers\backend\setupManagement\StudentClassController;
use App\Http\Controllers\backend\setupManagement\StudentExamController;
use App\Http\Controllers\backend\setupManagement\StudentGroupController;
use App\Http\Controllers\backend\setupManagement\StudentShiftController;
use App\Http\Controllers\backend\setupManagement\StudentSubjectController;
use App\Http\Controllers\backend\setupManagement\StudentYearController;
use App\Http\Controllers\backend\setupManagement\SubjectAssignController;
use App\Http\Controllers\backend\StudentManagment\StudentRegController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

Route::prefix('user')->group(function (){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('add.user');
    Route::post('/store',[UserController::class,'UserStore'])->name('store.user');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('update.user');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});
Route::prefix('profile')->group(function (){
    Route::get('/user',[ProfileController::class,'UserProfile'])->name('user.profile');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('edit.profile');
    Route::post('/update',[ProfileController::class,'ProfileUpdate'])->name('store.profile');
    Route::get('/changepassword',[ProfileController::class,'ChangePassword'])->name('change.password');
    Route::post('/password',[ProfileController::class,'SavePassword'])->name('store.password');
});

Route::prefix('setup')->group(function (){
    Route::get('/student/class/view',[StudentClassController::class,'StudentClass'])->name('student.class');
    Route::get('/student/class/add',[StudentClassController::class,'AddClass'])->name('add.class');
    Route::post('/student/class/store',[StudentClassController::class,'StoreClass'])->name('store.class');
    Route::get('/student/class/edit/{id}',[StudentClassController::class,'ClassEdit'])->name('class.edit');
    Route::post('/student/class/update/{id}',[StudentClassController::class,'UpdateClass'])->name('class.update');
    Route::post('/student/class/delete/{id}',[StudentClassController::class,'ClassDelete'])->name('class.delete');

    Route::get('/student/year/view',[StudentYearController::class,'StudentYear'])->name('student.year');
    Route::get('/student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('add.year');
    Route::post('/student/Year/store',[StudentYearController::class,'StoreYear'])->name('store.year');
    Route::get('/student/year/edit/{id}',[StudentYearController::class,'YearEdit'])->name('year.edit');
    Route::post('/student/Year/update/{id}',[StudentYearController::class,'UpdateYear'])->name('update.year');
    Route::get('/student/year/delete/{id}',[StudentYearController::class,'YearDelete'])->name('year.delete');

    Route::get('/student/group/view',[StudentGroupController::class,'StudentGroup'])->name('student.group');
    Route::get('/student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('add.group');
    Route::post('/student/group/store',[StudentGroupController::class,'StoreGroup'])->name('store.group');
    Route::get('/student/year/edit/{id}',[StudentGroupController::class,'GroupEdit'])->name('year.edit');
    Route::post('/student/group/update/{id}',[StudentGroupController::class,'UpdateYear'])->name('update.group');
    Route::get('/student/group/delete/{id}',[StudentGroupController::class,'groupDelete'])->name('group.delete');

    Route::get('/student/shift/view',[StudentShiftController::class,'StudentShift'])->name('student.shift');
    Route::get('/student/shift/add',[StudentShiftController::class,'StudentShiftAdd'])->name('add.shift');
    Route::post('/student/shift/store',[StudentShiftController::class,'StoreShift'])->name('store.shift');
    Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'ShiftEdit'])->name('shift.edit');
    Route::post('/student/Shift/update/{id}',[StudentShiftController::class,'UpdateShift'])->name('update.shift');
    Route::get('/student/Shift/delete/{id}',[StudentShiftController::class,'DeleteShift'])->name('shift.delete');

    Route::get('/student/feeCategory/view',[FeeCategoryController::class,'StudentFeeCategory'])->name('student.feeCategory');
    Route::get('/student/feeCategory/add',[FeeCategoryController::class,'StudentFeeCategoryAdd'])->name('add.FeeCategory');
    Route::post('/student/feeCategory/store',[FeeCategoryController::class,'StudentFeeCategoryStore'])->name('store.FeeCategory');
    Route::get('/student/feeCategory/edit/{id}',[FeeCategoryController::class,'StudentFeeCategoryEdit'])->name('FeeCategory.edit');
    Route::post('/student/feeCategory/update/{id}',[FeeCategoryController::class,'StudentFeeCategoryUpdate'])->name('update.FeeCategory');
    Route::get('/student/feeCategory/delete/{id}',[FeeCategoryController::class,'StudentFeeCategoryDelete'])->name('FeeCategory.delete');

    Route::get('/student/feeCategoryAmount/view',[FeeCategoryAmountController::class,'StudentFeeCategoryAmount'])->name('student.feeCategoryAmount');
    Route::get('/student/feeCategoryAmount/add',[FeeCategoryAmountController::class,'StudentFeeCategoryAmountAdd'])->name('add.FeeCategoryAmount');
    Route::post('/student/feeCategoryAmount/store',[FeeCategoryAmountController::class,'StudentFeeCategoryAmountStore'])->name('store.FeeCategoryAmount');
    Route::get('/student/feeCategoryAmount/edit/{id}',[FeeCategoryAmountController::class,'StudentFeeCategoryAmountEdit'])->name('FeeCategory.edit');
    Route::post('/student/feeCategoryAmount/update/{fee_category_id}',[FeeCategoryAmountController::class,'StudentFeeCategoryAmountUpdate'])->name('update.FeeCategoryAmount');
    Route::get('/student/feeCategoryAmount/details/{id}',[FeeCategoryAmountController::class,'StudentFeeCategoryAmountDetails'])->name('FeeCategory.details');

    Route::get('/student/exam/view',[StudentExamController::class,'StudentExam'])->name('student.exam');
    Route::get('/student/exam/add',[StudentExamController::class,'StudentExamAdd'])->name('add.exam');
    Route::post('/student/exam/store',[StudentExamController::class,'StoreExam'])->name('store.exam');
    Route::get('/student/exam/edit/{id}',[StudentExamController::class,'ExamEdit'])->name('exam.edit');
    Route::post('/student/exam/update/{id}',[StudentExamController::class,'UpdateExam'])->name('update.exam');
    Route::get('/student/exam/delete/{id}',[StudentExamController::class,'DeleteExam'])->name('exam.delete');

    Route::get('/student/subject/view',[StudentSubjectController::class,'StudentSubject'])->name('student.subject');
    Route::get('/student/subject/add',[StudentSubjectController::class,'StudentSubjectAdd'])->name('add.subject');
    Route::post('/student/subject/store',[StudentSubjectController::class,'StoreSubject'])->name('store.subject');
    Route::get('/student/subject/edit/{id}',[StudentSubjectController::class,'SubjectEdit'])->name('subject.edit');
    Route::post('/student/subject/update/{id}',[StudentSubjectController::class,'UpdateSubject'])->name('update.subject');
    Route::get('/student/subject/delete/{id}',[StudentSubjectController::class,'DeleteSubject'])->name('subject.delete');

    Route::get('/student/subjectAssign/view',[SubjectAssignController::class,'StudentSubjectAssign'])->name('subject.assign');
    Route::get('/student/subjectAssign/add',[SubjectAssignController::class,'StudentSubjectAssignAdd'])->name('add.SubjectAssign');
    Route::post('/student/subjectAssign/store',[SubjectAssignController::class,'StudentSubjectAssignStore'])->name('store.SubjectAssign');
    Route::get('/student/subjectAssign/edit/{id}',[SubjectAssignController::class,'StudentSubjectAssignEdit'])->name('SubjectAssign.edit');
    Route::post('/student/subjectAssign/update/{class_id}',[SubjectAssignController::class,'StudentSubjectAssignUpdate'])->name('update.SubjectAssign');
    Route::get('/student/subjectAssign/details/{id}',[SubjectAssignController::class,'StudentSubjectAssignDetails'])->name('SubjectAssign.details');
    Route::get('/student/subjectAssign/delete/{id}',[SubjectAssignController::class,'DeleteSubjectAssign'])->name('SubjectAssign.delete');


    Route::get('/teacher/designation/view',[DesignationController::class,'DesignationView'])->name('designation');
    Route::get('/teacher/designation/add',[DesignationController::class,'DesignationAdd'])->name('add.designation');
    Route::post('/teacher/designation/store',[DesignationController::class,'DesignationStore'])->name('store.designation');
    Route::get('/teacher/designation/edit/{id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');
    Route::post('/teacher/designation/update/{id}',[DesignationController::class,'DesignationUpdate'])->name('update.designation');
    Route::get('/teacher/designation/delete/{id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');
});

Route::prefix('student')->group(function (){
    Route::get('/reg/view',[StudentRegController::class,'StudentRegView'])->name('student.reg');
    Route::get('/reg/add',[StudentRegController::class,'AddStudent'])->name('add.student');
    Route::post('/reg/store',[StudentRegController::class,'StoreRegistration'])->name('store.student.reg');
    Route::get('/reg/search',[StudentRegController::class,'SearchStudent'])->name('student.class.year.wise');



    Route::get('/reg/edit/{student_id}',[StudentRegController::class,'StudentRegEdit'])->name('student.reg.edit');
    Route::post('/reg/update/{student_id}}',[StudentRegController::class,'StudentRegUpdate'])->name('update.student.reg');
    Route::get('/reg/promotion/{student_id}}',[StudentRegController::class,'StudentRegPromotion'])->name('student.reg.promotion');
    Route::post('/promotion/update/{student_id}}',[StudentRegController::class,'UpdateRegPromotion'])->name('update.student.promotion');
    Route::get('/promotion/details/{student_id}}',[StudentRegController::class,'StudentPromotionDetails'])->name('student.registration.details');
});







