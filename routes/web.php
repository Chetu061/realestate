<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\backend\PropertyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\backend\PropertyTypeController;
use App\Http\Middleware\RedirectIfAuthenticated; //when any dashboard open without logout login page not open
use App\Http\Controllers\Agent\AgentPropertyController;
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

// adminpanel sidebar
Route::controller(AdminController::class)->group(function () {

    Route::get('/all/agent', 'AllAgent')->name('all.agent');
    Route::get('/add/agent', 'AddAgent')->name('add.agent');
    Route::post('/store/agent', 'StoreAgent')->name('store.agent');
    Route::get('/edit/agent/{id}', 'EditAgent')->name('edit.agent');
    Route::get('/delete/agent/{id}', 'DeleteAgent')->name('delete_agent');
    Route::post('/update/agent', 'UpdateAgent')->name('update_agent');
    Route::get('/changeStatus', 'changeStatus');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

//protect from one another entry in agent dashboard 
// AGENT GROUP middleWARE 
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.agent_dashboard');
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::get('/agent/change/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');

    Route::post('/agent/update/password', [AgentController::class, 'AgentUpdatePassword'])->name('agent.update.password');
});
Route::post('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);

//backend
//All Route of PropertyType controller
// there is no need of controller name at time route creation because controller group route is given
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });
    ////Amenties used same controller
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/amenitie', 'AllAmenitie')->name('all_amenitie');
        Route::get('/add/amenitie', 'AddAmenitie')->name('add_amenitie');
        Route::post('/store/amenitie', 'StoreAmenitie')->name('store_amenitie');
        Route::get('/edit/amenitie/{id}', 'EditAmenitie')->name('edit_amenitie');
        Route::post('/update/amenitie', 'UpdateAmenitie')->name('update_amenitie');
        Route::get('/delete/amenitie/{id}', 'DeleteAmenitie')->name('delete_amenitie');
    });
    //ProperyController
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/all/property', 'AllProperty')->name('all_property');
        Route::get('/add/property', 'Addproperty')->name('add_property');
        Route::post('/store/property', 'StoreProperty')->name('store_property');
        Route::get('/edit/property/{id}', 'EditProperty')->name('edit_property');
        Route::post('/update/property', 'UpdateProperty')->name('update_property');
        Route::post('/update/propertythumbnail', 'update_property_thumbnail')->name('update_property_thumbnail');

        Route::post('/update/property/multiimage', 'UpdatePropertyMultiimage')->name('update.property.multiimage');
        Route::get('/property/multiimg/delete/{id}', 'PropertyMultiImageDelete')->name('property.multiimg.delete');
        Route::post('/store/new/multiimage', 'StoreNewMultiimage')->name('store.new.multiimage');
        Route::post('/update/property/facilities', 'UpdatePropertyFacilities')->name('update.property.facilities');
        Route::get('/delete/property/{id}', 'DeleteProperty')->name('delete.property');
        Route::get('/details/property/{id}', 'DetailsProperty')->name('details.property');
        Route::post('/inactive/property', 'InactiveProperty')->name('inactive.property');
        Route::post('/active/property', 'ActiveProperty')->name('active.property');
    });
}); //end grup admin middleWARE

/// Agent Group Middleware 
Route::middleware(['auth', 'role:agent'])->group(function () {

    // Agent All Property  
    Route::controller(AgentPropertyController::class)->group(function () {

        Route::get('/agent/all/property', 'AgentAllProperty')->name('agent.all.property');
        Route::get('/agent/add/property', 'AgentAddProperty')->name('agent.add.property');
        Route::post('/agent/store/property', 'AgentStoreProperty')->name('agent.store.property');
        Route::get('/agent/edit/property/{id}', 'AgentEditProperty')->name('agent.edit.property');

        Route::post('/agent/update/property', 'AgentUpdateProperty')->name('agent.update.property');

        Route::post('/agent/update/property/thambnail', 'AgentUpdatePropertyThambnail')->name('agent.update.property.thambnail');

        Route::post('/agent/update/property/multiimage', 'AgentUpdatePropertyMultiimage')->name('agent.update.property.multiimage');

        Route::get('/agent/property/multiimg/delete/{id}', 'AgentPropertyMultiimgDelete')->name('agent.property.multiimg.delete');
        Route::post('/agent/store/new/multiimage', 'AgentStoreNewMultiimage')->name('agent.store.new.multiimage');

        Route::post('/agent/update/property/facilities', 'AgentUpdatePropertyFacilities')->name('agent.update.property.facilities');
        Route::get('/agent/details/property/{id}', 'AgentDetailsProperty')->name('agent.details.property');

        Route::get('/agent/delete/property/{id}', 'AgentDeleteProperty')->name('agent.delete.property');
    });
}); //end agent middleware

// Agent Buy Package Route from admin 
Route::controller(AgentPropertyController::class)->group(function () {

    Route::get('/buy/package', 'BuyPackage')->name('buy.package');
});
