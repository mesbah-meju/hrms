<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\WebController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\RolePermissionController;
use App\Http\Controllers\User\UserController;

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

Route::get('/', [WebController::class, 'index']);
Route::get('job/{id}/{slug?}', [WebController::class, 'jobDetails'])->name('job.details');
Route::post('job-application', [WebController::class, 'jobApply'])->name('job.application');

// Front Page Route
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'Auth']);

Route::get('mail', [HomeController::class, 'mail']);

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::get('dashboard', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);

    Route::get('logout', [LoginController::class, 'logout']);
    
    Route::resource('user', UserController::class)->parameters(['user' => 'user_id']);
    Route::resource('userRole', RoleController::class)->parameters(['userRole' => 'role_id']);
    Route::resource('rolePermission', RolePermissionController::class)->parameters(['rolePermission' => 'id']);
    Route::post('rolePermission/get_all_menu', [RolePermissionController::class, 'getAllMenu']);
    Route::resource('changePassword', ChangePasswordController::class)->parameters(['changePassword' => 'id']);

});

// Reset password routes
Route::get('reset-password-user', [ResetPasswordController::class, 'index'])->name('reset.password');
Route::post('reset-password-user', [ResetPasswordController::class, 'sendResetLink'])->name('reset.password');
Route::get('enter-password', [ResetPasswordController::class, 'enterPassword'])->name('reset.password.enter');
Route::post('enter-password', [ResetPasswordController::class, 'store'])->name('reset.password.enter');

// Language switch route
Route::get('local/{language}', function ($language) {
    session(['my_locale' => $language]);
    return redirect()->back();
});
