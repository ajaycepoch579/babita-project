<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmpDepartmentController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('students', UserController::class);
Route::get('/studentindex', [UserController::class, 'index'])->name('student.index');
Route::get('/studentshow/{id}', [UserController::class, 'show'])->name('student.show');
Route::post('/studentcreate', [UserController::class, 'create'])->name('student.create');
Route::get('/studentedit/{id}', [UserController::class, 'edit'])->name('student.edit');
Route::put('/studentupdate/{id}', [UserController::class, 'update'])->name('student.update');
Route::delete('/studentdestroy/{id}', [UserController::class, 'destroy'])->name('student.destroy');

Route::resource('employees', EmployeeController::class);
Route::get('/employeeindex', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employeeshow/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employeecreate', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/employeeedit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employeeupdate/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employeedestroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

Route::resource('empDepartments', EmpDepartmentController::class);