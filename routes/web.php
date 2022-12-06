<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware('auth')->middleware('isAdmin');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create')->middleware('auth')->middleware('isAdmin');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store')->middleware('auth')->middleware('isAdmin');
// Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show')->middleware('auth')->middleware('isAdmin');



Route::get('/customers', [CustomerController::class,'index'])->name('customers.index')->middleware('auth');
Route::get('/customers/create', [CustomerController::class,'create'])->name('customers.create')->middleware('auth');
Route::post('/customers/store', [CustomerController::class,'store'])->name('customers.store')->middleware('auth');
Route::get('/customers/{post}/edit', [CustomerController::class,'edit'])->name('customers.edit')->middleware('auth');
Route::put('/customers/{post}', [CustomerController::class,'update'])->name('customers.update')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [CustomerController::class,'index'])->name('customers.index')->middleware('auth');
Route::get('/denied', [HomeController::class,'denied']);
Route::get('/register', [HomeController::class,'denied']);
