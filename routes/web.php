<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
})->middleware('language');

Route::get('/', function(){
    return redirect('admin/dashboard');
});

Route::get('login_with_otp', [AdminController::class, 'login_with_otp']);
Route::post('enter_otp', [AdminController::class, 'enter_otp']);

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('login', [AdminController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('products', ProductController::class);    
});

Route::fallback(function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
