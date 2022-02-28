<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('auth.login');
});

Auth::routes(); 
Route::post('/login', [LoginController::class, 'login'])->name('login'); 
Route::get('/loginForm', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//employee routes
Route::get('employee', [EmployeeController::class, 'index'])->name('employees.index')->middleware('is_admin');
Route::get('employee/add', [EmployeeController::class, 'create'])->name('employees.create')->middleware('is_admin');
Route::post('employee/add', [EmployeeController::class, 'store'])->name('employees.store')->middleware('is_admin');
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware('is_admin');
Route::put('employee/edit/{id}', [EmployeeController::class, 'update'])->name('employees.update')->middleware('is_admin');
Route::get('employee/show/{id}', [EmployeeController::class, 'show'])->name('employees.show')->middleware('is_admin');
Route::delete('employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy')->middleware('is_admin');
//companies routes
Route::get('company', [CompanyController::class, 'index'])->name('companies.index')->middleware('is_admin');
Route::get('company/add', [CompanyController::class, 'create'])->name('companies.create')->middleware('is_admin');
Route::post('company/add', [CompanyController::class, 'store'])->name('companies.store')->middleware('is_admin');
Route::get('company/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit')->middleware('is_admin');
Route::put('company/edit/{id}', [CompanyController::class, 'update'])->name('companies.update')->middleware('is_admin');
Route::get('company/show/{id}', [CompanyController::class, 'show'])->name('companies.show')->middleware('is_admin');
Route::delete('company/delete/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy')->middleware('is_admin');
// Route::resource('employee','\App\Http\Controllers\EmployeeController')->middleware('is_admin');;