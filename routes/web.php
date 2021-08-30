<?php

use App\Http\Controllers\AuthController;
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



Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::get('/register',[AuthController::class,'registerPage'])->name('register');

Route::post('/register',[AuthController::class,'registerUser']);
Route::post('/login',[AuthController::class,'login'])->name('login');


Route::get('/dashboard', function(){
    return view('dashboard');
});





