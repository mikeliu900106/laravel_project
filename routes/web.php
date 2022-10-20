<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VacanciesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\PairController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\CompanyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------- ------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PageController::class,'index']);
Route::get('/app', function () { 
    return view('layout/app');
});
Route::get('/home', function () {
    return view('home');
});


// Route::post('Login', 'LoginController@login');
Route::resource('Student',StudentController::class);
Route::resource('Enter',EnterController::class);
Route::resource('Teacher',TeacherController::class);
Route::resource('Vacancies',VacanciesController::class);
Route::resource('Resume',ResumeController::class);
Route::resource('Apply',ApplyController::class);
Route::resource('Pair',PairController::class);
Route::resource('Check',CheckController::class);
Route::resource('Chat',ChatController::class);
Route::resource('Signup',SignupController::class);
Route::resource('Error',ErrorController::class);
Route::resource('Company',CompanyController::class);

Route::resource('Login',LoginController::class);