<?php

use App\Http\Controllers\Admin\ThemeContoller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//admin
require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    // profile
    Route::get('/admin/profile',[AdminProfile::class,'index'])->name('admin.profile');
    Route::post('admin/profile/update',[AdminProfile::class,'update'])->name('admin.profile.update');
    // change theme
    Route::get('/theme/light',[ThemeContoller::class,'light'])->name('theme.light');
    Route::get('/theme/dark',[ThemeContoller::class,'dark'])->name('theme.dark');
});
//
Route::middleware('guest')->group(function(){
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

});
Route::middleware(['auth','role:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

