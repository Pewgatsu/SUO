<?php

use App\Http\Controllers\AboutSystemController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BuildsController;
use App\Http\Controllers\ComponentInfoController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditStoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsInfoController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SystemBuilderController;
use App\Http\Controllers\StoreController;
use App\Http\Livewire\ProductsList\MotherboardProducts;
use App\Http\Livewire\ProductsList\CPUProducts;
use App\Http\Livewire\ProductsList\CPUCoolerProducts;
use App\Http\Livewire\ProductsList\GraphicsCardProducts;
use App\Http\Livewire\ProductsList\RAMProducts;
use App\Http\Livewire\ProductsList\StorageProducts;
use App\Http\Livewire\ProductsList\PSUProducts;
use App\Http\Livewire\ProductsList\ComputerCaseProducts;
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
Route::get('/home',[HomeController::class,'index'])->name('home');

// Login & Register

Route::get('/login',[\App\Http\Controllers\AuthController::class,'loginPage'])->name('login');
Route::get('/register',[\App\Http\Controllers\AuthController::class,'registerPage'])->name('register');
Route::get('/logout',[\App\Http\Controllers\LogoutController::class,'logout'])->name('user.logout');



Route::group(['middleware' => 'is_active'], function(){
    Route::group(['middleware' => 'auth'], function (){

        //ROUTE GROUP FOR ADMIN
        Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function(){
            // Admin Dashboard Page
            Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


            // Add Components
            Route::post('dashboard/add/motherboard', [DashboardController::class, 'add_motherboard'])->name('admin.dashboard.add_motherboard');
            Route::post('dashboard/add/cpu', [DashboardController::class, 'add_cpu'])->name('admin.dashboard.add_cpu');
            Route::post('dashboard/add/cpu_cooler', [DashboardController::class, 'add_cpu_cooler'])->name('admin.dashboard.add_cpu_cooler');
            Route::post('dashboard/add/graphics_card', [DashboardController::class, 'add_graphics_card'])->name('admin.dashboard.add_graphics_card');
            Route::post('dashboard/add/ram', [DashboardController::class, 'add_ram'])->name('admin.dashboard.add_ram');
            Route::post('dashboard/add/storage', [DashboardController::class, 'add_storage'])->name('admin.dashboard.add_storage');
            Route::post('dashboard/add/psu', [DashboardController::class, 'add_psu'])->name('admin.dashboard.add_psu');
            Route::post('dashboard/add/computer_case', [DashboardController::class, 'add_computer_case'])->name('admin.dashboard.add_computer_case');

            // Compute Distance
            Route::post('dashboard/compute', [DashboardController::class, 'compute_distances'])->name('admin.dashboard.compute');

            // Users Management Page
            Route::get('users', [UsersController::class, 'index'])->name('admin.users');
            // Remove, Suspend, and Unsuspend User
            Route::delete('users/remove/{account}', [UsersController::class, 'remove'])->name('admin.users.remove');
            Route::post('users/suspend/{account}', [UsersController::class, 'suspend'])->name('admin.users.suspend');
            Route::post('users/unsuspend/{account}', [UsersController::class, 'unsuspend'])->name('admin.users.unsuspend');

            // Components Management Page
            Route::get('components/motherboards', [ComponentsController::class, 'index_motherboards'])->name('admin.components.motherboards');
            Route::get('components/cpus', [ComponentsController::class, 'index_cpus'])->name('admin.components.cpus');
            Route::get('components/cpu_coolers', [ComponentsController::class, 'index_cpu_coolers'])->name('admin.components.cpu_coolers');
            Route::get('components/graphics_cards', [ComponentsController::class, 'index_graphics_cards'])->name('admin.components.graphics_cards');
            Route::get('components/rams', [ComponentsController::class, 'index_rams'])->name('admin.components.rams');
            Route::get('components/storages', [ComponentsController::class, 'index_storages'])->name('admin.components.storages');
            Route::get('components/psus', [ComponentsController::class, 'index_psus'])->name('admin.components.psus');
            Route::get('components/computer_cases', [ComponentsController::class, 'index_computer_cases'])->name('admin.components.computer_cases');

            // Edit Components
            Route::post('components/motherboards/edit/{component}', [ComponentsController::class, 'edit_motherboard'])->name('admin.components.motherboards.edit');
            Route::post('components/cpus/edit/{component}', [ComponentsController::class, 'edit_cpu'])->name('admin.components.cpus.edit');
            Route::post('components/cpu_coolers/edit/{component}', [ComponentsController::class, 'edit_cpu_cooler'])->name('admin.components.cpu_coolers.edit');
            Route::post('components/graphics_cards/edit/{component}', [ComponentsController::class, 'edit_graphics_card'])->name('admin.components.graphics_cards.edit');
            Route::post('components/rams/edit/{component}', [ComponentsController::class, 'edit_ram'])->name('admin.components.rams.edit');
            Route::post('components/storages/edit/{component}', [ComponentsController::class, 'edit_storage'])->name('admin.components.storages.edit');
            Route::post('components/psus/edit/{component}', [ComponentsController::class, 'edit_psu'])->name('admin.components.psus.edit');
            Route::post('components/computer_cases/edit/{component}', [ComponentsController::class, 'edit_computer_case'])->name('admin.components.computer_cases.edit');

            // Delete Components
            Route::delete('components/motherboards/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.motherboards.delete');
            Route::delete('components/cpus/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.cpus.delete');
            Route::delete('components/cpu_coolers/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.cpu_coolers.delete');
            Route::delete('components/graphics_cards/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.graphics_cards.delete');
            Route::delete('components/rams/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.rams.delete');
            Route::delete('components/storages/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.storages.delete');
            Route::delete('components/psus/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.psus.delete');
            Route::delete('components/computer_cases/delete/{component}', [ComponentsController::class, 'delete_component'])->name('admin.components.computer_cases.delete');
        });

        //Route::get('seller/{id}', [StoreController::class, 'index'])->name('viewStore');

        //ROUTE GROUP FOR SELLER
        Route::group(['prefix' => 'seller','middleware' => 'is_seller'], function (){
            //Seller
            Route::get('store', [StoreController::class, 'myStore'])->name('myStore');
            Route::any('edit/store/save', [EditStoreController::class, 'saveInfo'])->name('saveInfo');
            Route::get('edit/store', [EditStoreController::class, 'index'])->name('editStore');

            // Add Products
            Route::post('store/add/motherboard', [StoreController::class, 'add_motherboard'])->name('seller.store.add_motherboard');
            Route::post('store/add/cpu', [StoreController::class, 'add_cpu'])->name('seller.store.add_cpu');
            Route::post('store/add/cpu_cooler', [StoreController::class, 'add_cpu_cooler'])->name('seller.store.add_cpu_cooler');
            Route::post('store/add/graphics_card', [StoreController::class, 'add_graphics_card'])->name('seller.store.add_graphics_card');
            Route::post('store/add/ram', [StoreController::class, 'add_ram'])->name('seller.store.add_ram');
            Route::post('store/add/storage', [StoreController::class, 'add_storage'])->name('seller.store.add_storage');
            Route::post('store/add/psu', [StoreController::class, 'add_psu'])->name('seller.store.add_psu');
            Route::post('store/add/computer_case', [StoreController::class, 'add_computer_case'])->name('seller.store.add_computer_case');

            // Products Management Page
            Route::get('products/motherboards', [ProductsController::class, 'index_motherboards'])->name('seller.products.motherboards');
            Route::get('products/cpus', [ProductsController::class, 'index_cpus'])->name('seller.products.cpus');
            Route::get('products/cpu_coolers', [ProductsController::class, 'index_cpu_coolers'])->name('seller.products.cpu_coolers');
            Route::get('products/graphics_cards', [ProductsController::class, 'index_graphics_cards'])->name('seller.products.graphics_cards');
            Route::get('products/rams', [ProductsController::class, 'index_rams'])->name('seller.products.rams');
            Route::get('products/storages', [ProductsController::class, 'index_storages'])->name('seller.products.storages');
            Route::get('products/psus', [ProductsController::class, 'index_psus'])->name('seller.products.psus');
            Route::get('products/computer_cases', [ProductsController::class, 'index_computer_cases'])->name('seller.products.computer_cases');

            // Component Details Page
            Route::get('components/motherboards', [ComponentsController::class, 'index_motherboards_info'])->name('seller.components.motherboards');
            Route::get('components/cpus', [ComponentsController::class, 'index_cpus_info'])->name('seller.components.cpus');
            Route::get('components/cpu_coolers', [ComponentsController::class, 'index_cpu_coolers_info'])->name('seller.components.cpu_coolers');
            Route::get('components/graphics_cards', [ComponentsController::class, 'index_graphics_cards_info'])->name('seller.components.graphics_cards');
            Route::get('components/rams', [ComponentsController::class, 'index_rams_info'])->name('seller.components.rams');
            Route::get('components/storages', [ComponentsController::class, 'index_storages_info'])->name('seller.components.storages');
            Route::get('components/psus', [ComponentsController::class, 'index_psus_info'])->name('seller.components.psus');
            Route::get('components/computer_cases', [ComponentsController::class, 'index_computer_cases_info'])->name('seller.components.computer_cases');

            // Edit Products
            Route::post('products/motherboards/edit/{component}', [ProductsController::class, 'edit_motherboard'])->name('seller.products.motherboards.edit');
            Route::post('products/cpus/edit/{component}', [ProductsController::class, 'edit_cpu'])->name('seller.products.cpus.edit');
            Route::post('products/cpu_coolers/edit/{component}', [ProductsController::class, 'edit_cpu_cooler'])->name('seller.products.cpu_coolers.edit');
            Route::post('products/graphics_cards/edit/{component}', [ProductsController::class, 'edit_graphics_card'])->name('seller.products.graphics_cards.edit');
            Route::post('products/rams/edit/{component}', [ProductsController::class, 'edit_ram'])->name('seller.products.rams.edit');
            Route::post('products/storages/edit/{component}', [ProductsController::class, 'edit_storage'])->name('seller.products.storages.edit');
            Route::post('products/psus/edit/{component}', [ProductsController::class, 'edit_psu'])->name('seller.products.psus.edit');
            Route::post('products/computer_cases/edit/{component}', [ProductsController::class, 'edit_computer_case'])->name('seller.products.computer_cases.edit');

            // Delete Products
            Route::delete('products/motherboards/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.motherboards.delete');
            Route::delete('products/cpus/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.cpus.delete');
            Route::delete('products/cpu_coolers/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.cpu_coolers.delete');
            Route::delete('products/graphics_cards/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.graphics_cards.delete');
            Route::delete('products/rams/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.rams.delete');
            Route::delete('products/storages/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.storages.delete');
            Route::delete('products/psus/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.psus.delete');
            Route::delete('products/computer_cases/delete/{component}', [ProductsController::class, 'delete_component'])->name('seller.products.computer_cases.delete');

            // Order Products
            Route::get('products/motherboards/orders/{component}', [OrdersController::class, 'index_motherboards'])->name('seller.products.motherboards.order');
            Route::get('products/cpus/orders/{component}', [OrdersController::class, 'index_cpus'])->name('seller.products.cpus.order');
            Route::get('products/cpu_coolers/orders/{component}', [OrdersController::class, 'index_cpu_coolers'])->name('seller.products.cpu_coolers.order');
            Route::get('products/graphics_cards/orders/{component}', [OrdersController::class, 'index_graphics_cards'])->name('seller.products.graphics_cards.order');
            Route::get('products/rams/orders/{component}', [OrdersController::class, 'index_rams'])->name('seller.products.rams.order');
            Route::get('products/storages/orders/{component}', [OrdersController::class, 'index_storages'])->name('seller.products.storages.order');
            Route::get('products/psus/orders/{component}', [OrdersController::class, 'index_psus'])->name('seller.products.psus.order');
            Route::get('products/computer_cases/orders/{component}', [OrdersController::class, 'index_computer_cases'])->name('seller.products.computer_cases.order');

            // Edit Product
            Route::post('products/motherboards/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.motherboards.orders.edit');
            Route::post('products/cpus/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.cpus.orders.edit');
            Route::post('products/cpu_coolers/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.cpu_coolers.orders.edit');
            Route::post('products/graphics_cards/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.graphics_cards.orders.edit');
            Route::post('products/rams/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.rams.orders.edit');
            Route::post('products/storages/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.storages.orders.edit');
            Route::post('products/psus/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.psus.orders.edit');
            Route::post('products/computer_cases/orders/{component}/edit/{product}', [OrdersController::class, 'edit_product'])->name('seller.products.computer_cases.orders.edit');

            // Delete Product
            Route::delete('products/motherboards/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.motherboards.orders.delete');
            Route::delete('products/cpus/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.cpus.orders.delete');
            Route::delete('products/cpu_coolers/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.cpu_coolers.orders.delete');
            Route::delete('products/graphics_cards/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.graphics_cards.orders.delete');
            Route::delete('products/rams/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.rams.orders.delete');
            Route::delete('products/storages/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.storages.orders.delete');
            Route::delete('products/psus/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.psus.orders.delete');
            Route::delete('products/computer_cases/orders/{component}/delete/{product}', [OrdersController::class, 'delete_product'])->name('seller.products.computer_cases.orders.delete');

            // Accept Order
            Route::post('products/motherboards/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.motherboards.orders.accept');
            Route::post('products/cpus/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.cpus.orders.accept');
            Route::post('products/cpu_coolers/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.cpu_coolers.orders.accept');
            Route::post('products/graphics_cards/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.graphics_cards.orders.accept');
            Route::post('products/rams/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.rams.orders.accept');
            Route::post('products/storages/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.storages.orders.accept');
            Route::post('products/psus/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.psus.orders.accept');
            Route::post('products/computer_cases/orders/{component}/accept/{product}', [OrdersController::class, 'accept_order'])->name('seller.products.computer_cases.orders.accept');

            // Cancel Order
            Route::post('products/motherboards/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.motherboards.orders.cancel');
            Route::post('products/cpus/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.cpus.orders.cancel');
            Route::post('products/cpu_coolers/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.cpu_coolers.orders.cancel');
            Route::post('products/graphics_cards/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.graphics_cards.orders.cancel');
            Route::post('products/rams/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.rams.orders.cancel');
            Route::post('products/storages/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.storages.orders.cancel');
            Route::post('products/psus/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.psus.orders.cancel');
            Route::post('products/computer_cases/orders/{component}/cancel/{product}', [OrdersController::class, 'cancel_order'])->name('seller.products.computer_cases.orders.cancel');

            // Done Order
            Route::post('products/motherboards/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.motherboards.orders.done');
            Route::post('products/cpus/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.cpus.orders.done');
            Route::post('products/cpu_coolers/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.cpu_coolers.orders.done');
            Route::post('products/graphics_cards/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.graphics_cards.orders.done');
            Route::post('products/rams/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.rams.orders.done');
            Route::post('products/storages/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.storages.orders.done');
            Route::post('products/psus/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.psus.orders.done');
            Route::post('products/computer_cases/orders/{component}/done/{product}', [OrdersController::class, 'done_order'])->name('seller.products.computer_cases.orders.done');
        });
    });
});





// Consumer

//System Builder
Route::get('/builder', [SystemBuilderController::class, 'index'])->name('builder');
Route::post('/builder', [SystemBuilderController::class, 'control'])->name('control');
Route::get('/builds', [App\Http\Controllers\BuildsController::class,'index'])->name('builds');
Route::any('/builder/add/{product}',[SystemBuilderController::class, 'add_product'])->name('add_product');

// Products List Page
Route::any('/products/motherboards', [MotherboardProducts::class, 'render'])->name('products.motherboards');
Route::any('/products/cpus', [CPUProducts::class, 'render'])->name('products.cpus');
Route::any('/products/cpu_coolers', [CPUCoolerProducts::class, 'render'])->name('products.cpu_coolers');
Route::any('/products/graphics_cards', [GraphicsCardProducts::class, 'render'])->name('products.graphics_cards');
Route::any('/products/rams', [RAMProducts::class, 'render'])->name('products.rams');
Route::any('/products/storages', [StorageProducts::class, 'render'])->name('products.storages');
Route::any('/products/psus', [PSUProducts::class, 'render'])->name('products.psus');
Route::any('/products/computer_cases', [ComputerCaseProducts::class, 'render'])->name('products.computer_cases');

// About Us Page
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');

// About System Page
Route::get('/aboutsystem', [AboutSystemController::class, 'index'])->name('aboutsystem');

// Detailed Component Info
Route::get('/admin/components/motherboards/info/{id}', [ComponentInfoController::class, 'index'])->name('component.motherboards.info');
Route::get('/admin/components/cpus/info/{id}', [ComponentInfoController::class, 'index'])->name('component.cpus.info');
Route::get('/admin/components/cpu_coolers/info/{id}', [ComponentInfoController::class, 'index'])->name('component.cpu_coolers.info');
Route::get('/admin/components/graphics_cards/info/{id}', [ComponentInfoController::class, 'index'])->name('component.graphics_cards.info');
Route::get('/admin/components/rams/info/{id}', [ComponentInfoController::class, 'index'])->name('component.rams.info');
Route::get('/admin/components/storages/info/{id}', [ComponentInfoController::class, 'index'])->name('component.storages.info');
Route::get('/admin/components/psus/info/{id}', [ComponentInfoController::class, 'index'])->name('component.psus.info');
Route::get('/admin/components/computer_cases/info/{id}', [ComponentInfoController::class, 'index'])->name('component.computer_cases.info');

Route::get('/components/info/{id}', [ComponentInfoController::class, 'index'])->name('component.info');

// Store Page
Route::get('/seller/{id}', [StoreController::class, 'index'])->name('viewStore');

// Detailed Product Info
Route::get('/products/motherboards/info/{id}', [ProductsInfoController::class, 'index'])->name('product.motherboards.info');
Route::get('/products/cpus/info/{id}', [ProductsInfoController::class, 'index'])->name('product.cpus.info');
Route::get('/products/cpu_coolers/info/{id}', [ProductsInfoController::class, 'index'])->name('product.cpu_coolers.info');
Route::get('/products/graphics_cards/info/{id}', [ProductsInfoController::class, 'index'])->name('product.graphics_cards.info');
Route::get('/products/rams/info/{id}', [ProductsInfoController::class, 'index'])->name('product.rams.info');
Route::get('/products/storages/info/{id}', [ProductsInfoController::class, 'index'])->name('product.storages.info');
Route::get('/products/psus/info/{id}', [ProductsInfoController::class, 'index'])->name('product.psus.info');
Route::get('/products/computer_cases/info/{id}', [ProductsInfoController::class, 'index'])->name('product.computer_cases.info');

Route::get('/products/info/{id}', [ProductsInfoController::class, 'index'])->name('product.info');

//builds
Route::get('/consumer/builds', [BuildsController::class, 'index'])->name('builds')->middleware('auth');
Route::delete('/consumer/builds/delete/{build}', [BuildsController::class, 'delete_build'])->name('consumer.builds.delete');
Route::any('/consumer/builds/edit/{build}', [SystemBuilderController::class, 'edit_build'])->name('consumer.builds.edit');
Route::any('/consumer/builds/view/{build}', [SystemBuilderController::class, 'view_build'])->name('consumer.builds.view');



// User Profile Page
Route::get('/profile',[UserProfileController::class,'index'])->name('user.profile');
Route::get('/profile/{account}', [UserProfileController::class, 'index_user'])->name('user.profile.search');


