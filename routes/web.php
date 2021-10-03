<?php

use App\Http\Controllers\AboutSystemController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BuildsController;
use App\Http\Controllers\ComponentInfoController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditStoreController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SystemBuilderController;
use App\Http\Controllers\StoreController;
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
    return view('landing.landingpage');
});

Auth::routes();

// Home
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

// Login & Register
Route::get('/login',[App\Http\Controllers\AuthController::class,'loginPage'])->name('login');
Route::get('/register',[App\Http\Controllers\AuthController::class,'registerPage'])->name('register');
Route::get('/logout',[\App\Http\Controllers\LogoutController::class,'logout'])->name('logout');

Route::post('/register',[App\Http\Controllers\AuthController::class, 'registerUser']);
Route::post('/login',[App\Http\Controllers\AuthController::class,'login']);

// Admin Dashboard Page
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Add Components
Route::post('/admin/dashboard/add/motherboard', [DashboardController::class, 'add_motherboard'])->name('admin.dashboard.add_motherboard');
Route::post('/admin/dashboard/add/cpu', [DashboardController::class, 'add_cpu'])->name('admin.dashboard.add_cpu');
Route::post('/admin/dashboard/add/cpu_cooler', [DashboardController::class, 'add_cpu_cooler'])->name('admin.dashboard.add_cpu_cooler');
Route::post('/admin/dashboard/add/graphics_card', [DashboardController::class, 'add_graphics_card'])->name('admin.dashboard.add_graphics_card');
Route::post('/admin/dashboard/add/ram', [DashboardController::class, 'add_ram'])->name('admin.dashboard.add_ram');
Route::post('/admin/dashboard/add/storage', [DashboardController::class, 'add_storage'])->name('admin.dashboard.add_storage');
Route::post('/admin/dashboard/add/psu', [DashboardController::class, 'add_psu'])->name('admin.dashboard.add_psu');
Route::post('/admin/dashboard/add/computer_case', [DashboardController::class, 'add_computer_case'])->name('admin.dashboard.add_computer_case');

// Users Management Page
Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users')->middleware('auth');

// Remove, Suspend, and Unsuspend User
Route::delete('/admin/users/remove/{account}', [UsersController::class, 'remove'])->name('admin.users.remove');
Route::post('/admin/users/suspend/{account}', [UsersController::class, 'suspend'])->name('admin.users.suspend');
Route::post('/admin/users/unsuspend/{account}', [UsersController::class, 'unsuspend'])->name('admin.users.unsuspend');

// Components Management Page
Route::get('/admin/components/motherboards', [ComponentsController::class, 'index_motherboards'])->name('admin.components.motherboards')->middleware('auth');
Route::get('/admin/components/cpus', [ComponentsController::class, 'index_cpus'])->name('admin.components.cpus')->middleware('auth');
Route::get('/admin/components/cpu_coolers', [ComponentsController::class, 'index_cpu_coolers'])->name('admin.components.cpu_coolers')->middleware('auth');
Route::get('/admin/components/graphics_cards', [ComponentsController::class, 'index_graphics_cards'])->name('admin.components.graphics_cards')->middleware('auth');
Route::get('/admin/components/rams', [ComponentsController::class, 'index_rams'])->name('admin.components.rams')->middleware('auth');
Route::get('/admin/components/storages', [ComponentsController::class, 'index_storages'])->name('admin.components.storages')->middleware('auth');
Route::get('/admin/components/psus', [ComponentsController::class, 'index_psus'])->name('admin.components.psus')->middleware('auth');
Route::get('/admin/components/computer_cases', [ComponentsController::class, 'index_computer_cases'])->name('admin.components.computer_cases')->middleware('auth');

// Edit Components
Route::post('/admin/components/motherboards/edit/{component}', [ComponentsController::class, 'edit_motherboard'])->name('admin.components.motherboards.edit');
Route::post('/admin/components/cpus/edit/{component}', [ComponentsController::class, 'edit_cpu'])->name('admin.components.cpus.edit');
Route::post('/admin/components/cpu_coolers/edit/{component}', [ComponentsController::class, 'edit_cpu_cooler'])->name('admin.components.cpu_coolers.edit');
Route::post('/admin/components/graphics_cards/edit/{component}', [ComponentsController::class, 'edit_graphics_card'])->name('admin.components.graphics_cards.edit');
Route::post('/admin/components/rams/edit/{component}', [ComponentsController::class, 'edit_ram'])->name('admin.components.rams.edit');
Route::post('/admin/components/storages/edit/{component}', [ComponentsController::class, 'edit_storage'])->name('admin.components.storages.edit');
Route::post('/admin/components/psus/edit/{component}', [ComponentsController::class, 'edit_psu'])->name('admin.components.psus.edit');
Route::post('/admin/components/computer_cases/edit/{component}', [ComponentsController::class, 'edit_computer_case'])->name('admin.components.computer_cases.edit');

// Delete Components
Route::delete('/admin/components/motherboards/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.motherboards.delete');
Route::delete('/admin/components/cpus/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.cpus.delete');
Route::delete('/admin/components/cpu_coolers/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.cpu_coolers.delete');
Route::delete('/admin/components/graphics_cards/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.graphics_cards.delete');
Route::delete('/admin/components/rams/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.rams.delete');
Route::delete('/admin/components/storages/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.storages.delete');
Route::delete('/admin/components/psus/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.psus.delete');
Route::delete('/admin/components/computer_cases/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.computer_cases.delete');

//Seller
Route::get('seller/store', [StoreController::class, 'myStore'])->name('myStore');
Route::get('seller/{id}', [StoreController::class, 'index'])->name('viewStore');
Route::any('seller/edit/store/save', [EditStoreController::class, 'saveInfo'])->name('saveInfo');
Route::get('seller/edit/store', [EditStoreController::class, 'index'])->name('editStore');

// Add Products
Route::post('/seller/store/add/motherboard', [StoreController::class, 'add_motherboard'])->name('seller.store.add_motherboard');
Route::post('/seller/store/add/cpu', [StoreController::class, 'add_cpu'])->name('seller.store.add_cpu');
Route::post('/seller/store/add/cpu_cooler', [StoreController::class, 'add_cpu_cooler'])->name('seller.store.add_cpu_cooler');
Route::post('/seller/store/add/graphics_card', [StoreController::class, 'add_graphics_card'])->name('seller.store.add_graphics_card');
Route::post('/seller/store/add/ram', [StoreController::class, 'add_ram'])->name('seller.store.add_ram');
Route::post('/seller/store/add/storage', [StoreController::class, 'add_storage'])->name('seller.store.add_storage');
Route::post('/seller/store/add/psu', [StoreController::class, 'add_psu'])->name('seller.store.add_psu');
Route::post('/seller/store/add/computer_case', [StoreController::class, 'add_computer_case'])->name('seller.store.add_computer_case');

// Products Management Page
Route::get('/seller/products/motherboards', [ProductsController::class, 'index_motherboards'])->name('seller.products.motherboards')->middleware('auth');
Route::get('/seller/products/cpus', [ProductsController::class, 'index_cpus'])->name('seller.products.cpus')->middleware('auth');
Route::get('/seller/products/cpu_coolers', [ProductsController::class, 'index_cpu_coolers'])->name('seller.products.cpu_coolers')->middleware('auth');
Route::get('/seller/products/graphics_cards', [ProductsController::class, 'index_graphics_cards'])->name('seller.products.graphics_cards')->middleware('auth');
Route::get('/seller/products/rams', [ProductsController::class, 'index_rams'])->name('seller.products.rams')->middleware('auth');
Route::get('/seller/products/storages', [ProductsController::class, 'index_storages'])->name('seller.products.storages')->middleware('auth');
Route::get('/seller/products/psus', [ProductsController::class, 'index_psus'])->name('seller.products.psus')->middleware('auth');
Route::get('/seller/products/computer_cases', [ProductsController::class, 'index_computer_cases'])->name('seller.products.computer_cases')->middleware('auth');

// Consumer

//System Builder
Route::get('/builder', [SystemBuilderController::class, 'index'])->name('builder');
Route::any('/components', [SystemBuilderController::class, 'print'])->name('components');
Route::post('/builder', [SystemBuilderController::class, 'control'])->name('control');

// Products List Page
Route::get('/product/motherboards', [ProductListController::class, 'index_motherboards'])->name('products.motherboards')->middleware('auth');
Route::get('/product/cpus', [ProductListController::class, 'index_cpus'])->name('products.cpus')->middleware('auth');
Route::get('/product/cpu_coolers', [ProductListController::class, 'index_cpu_coolers'])->name('products.cpu_coolers')->middleware('auth');
Route::get('/product/graphics_cards', [ProductListController::class, 'index_graphics_cards'])->name('products.graphics_cards')->middleware('auth');
Route::get('/product/rams', [ProductListController::class, 'index_rams'])->name('products.rams')->middleware('auth');
Route::get('/product/storages', [ProductListController::class, 'index_storages'])->name('products.storages')->middleware('auth');
Route::get('/product/psus', [ProductListController::class, 'index_psus'])->name('products.psus')->middleware('auth');
Route::get('/product/computer_cases', [ProductListController::class, 'index_computer_cases'])->name('products.computer_cases')->middleware('auth');

// About Us Page
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');

// About System Page
Route::get('/aboutsystem', [AboutSystemController::class, 'index'])->name('aboutsystem');

// Search Page
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Detailed Product Page
Route::get('/componentinfo', [ComponentInfoController::class, 'index'])->name('componentinfo');


//builds
Route::get('/consumer/builds', [BuildsController::class, 'index'])->name('builds')->middleware('auth');;
Route::delete('/consumer/builds/delete/{build}', [BuildsController::class, 'delete_build'])->name('consumer.builds.delete');


//Seller
Route::get('seller/store', [StoreController::class, 'myStore'])->name('myStore');
Route::get('seller/{id}', [StoreController::class, 'index'])->name('viewStore');
Route::any('seller/edit/store/save', [EditStoreController::class, 'saveInfo'])->name('saveInfo');
Route::get('seller/edit/store', [EditStoreController::class, 'index'])->name('editStore');




Route::get('/profile',[\App\Http\Controllers\UserProfileController::class,'index'])->name('user.profile');
