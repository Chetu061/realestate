<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome1', function () {
    return view('welcome1');
})->name('welcome1');
Route::get('/welcome2', function () {
    return view('welcome2');
})->name('welcome2');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//main route
//protect from one another entry in admin dashboard, multiuser
// ADMIN GROUP middleWARE 
Route::middleware(['auth','role:admin'])->group(function()
{
    Route::get('/admin/admin_dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.admin_dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout'); 
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile'); 
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password'); 
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});//end grup admin middleWARE

//protect from one another entry in agent dashboard 
// AGENT GROUP middleWARE 
Route::middleware(['auth','role:agent'])->group(function()
{
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
