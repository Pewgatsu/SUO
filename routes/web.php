<?php

use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SystemBuilderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('login');
});

Auth::routes();




Route::get('/login',[App\Http\Controllers\AuthController::class,'loginPage'])->name('login');
Route::get('/register',[App\Http\Controllers\AuthController::class,'registerPage'])->name('register');

Route::post('/register',[App\Http\Controllers\AuthController::class,'registerUser']);
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/users', [UsersController::class, 'index'])->name('users');

//System Builder
Route::get('/systemBuilder', [SystemBuilderController::class, 'index'])->name('index');
Route::post('/componentButton', [\App\Http\Controllers\ComponentsButtonController::class, 'print'])->name('buttonAction');
//Route::get('/ComponentsButtonController','ComponentsButtonController@returnData');



Route::get('/register2', function (){
    return view('auth.register');
});



