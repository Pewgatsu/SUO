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
Route::post('/dashboard/add/motherboard', [DashboardController::class, 'add_motherboard'])->name('dashboard.add_motherboard');
Route::post('/dashboard/add/cpu', [DashboardController::class, 'add_cpu'])->name('dashboard.add_cpu');
Route::post('/dashboard/add/cpu_cooler', [DashboardController::class, 'add_cpu_cooler'])->name('dashboard.add_cpu_cooler');
Route::post('/dashboard/add/graphics_card', [DashboardController::class, 'add_graphics_card'])->name('dashboard.add_graphics_card');
Route::post('/dashboard/add/ram', [DashboardController::class, 'add_ram'])->name('dashboard.add_ram');
Route::post('/dashboard/add/storage', [DashboardController::class, 'add_storage'])->name('dashboard.add_storage');
Route::post('/dashboard/add/psu', [DashboardController::class, 'add_psu'])->name('dashboard.add_psu');
Route::post('/dashboard/add/computer_case', [DashboardController::class, 'add_computer_case'])->name('dashboard.add_computer_case');

Route::get('/users', [UsersController::class, 'index'])->name('users');

<<<<<<< Updated upstream
=======
Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');

Route::get('/aboutsystem', [AboutSystemController::class, 'index'])->name('aboutsystem');
//components


>>>>>>> Stashed changes
//System Builder
Route::get('/systemBuilder', [SystemBuilderController::class, 'index'])->name('index');



Route::get('/register2', function (){
    return view('auth.register');
});



