<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\backend\PropertyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\backend\PropertyTypeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });//we can create dynamic route for frontend

Route::get('/welcome1', function () {
    return view('welcome1');
})->name('welcome1'); //for backend whole file

Route::get('/welcome2', function () {
    return view('welcome2'); //for laravel.com screen present
})->name('welcome2'); //static route



// dynamic route
Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // these static route when breeze package install automaticaly create
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // we can create route for frontend_dashboard
    Route::get('user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

require __DIR__ . '/auth.php';

//main route
//protect from one another entry in admin dashboard, multiuser
// ADMIN GROUP middleWARE 

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/admin_dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.admin_dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    // Route::get('/all/type', [PropertyTypeController::class, 'AllType'])->name('all.type');
}); //end grup admin middleWARE


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

//protect from one another entry in agent dashboard 
// AGENT GROUP middleWARE 
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

//All Route of PropertyType controller
// there is no need of controller name at time route creation because controller group route is given
Route::middleware(['auth','role:admin'])->group(function(){
   Route::controller(PropertyTypeController::class)->group(function()
    {
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/type','AddType')->name('add.type');
        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
        
    });
    ////Amenties used same controller
    Route::controller(PropertyTypeController::class)->group(function()
    {
        Route::get('/all/amenitie','AllAmenitie')->name('all_amenitie');
        Route::get('/add/amenitie','AddAmenitie')->name('add_amenitie');
        Route::post('/store/amenitie','StoreAmenitie')->name('store_amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit_amenitie');
        Route::post('/update/amenitie','UpdateAmenitie')->name('update_amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete_amenitie');
        
    });
    //ProperyController
    Route::controller(PropertyController::class)->group(function()
    {
        Route::get('/all/property','AllProperty')->name('all_property');
        Route::get('/add/property','Addproperty')->name('add_property');
        
    });
    
}); //end grup admin middleWARE
