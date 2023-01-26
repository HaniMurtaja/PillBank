<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
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


Route::redirect('/', '/login');



Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 

Route::get('userVerification/{token}', [App\Http\Controllers\UserVerificationController::class, 'approve'])->name('userVerification');
Auth::routes();


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   
        // Permissions
        Route::delete('permissions/destroy', [PermissionController::class,'massDestroy'])->name('permissions.massDestroy');
        Route::resource('permissions', PermissionController::class);
    
        // Roles
        Route::delete('roles/destroy', [RoleController::class,'massDestroy'])->name('roles.massDestroy');
        Route::resource('roles', RoleController::class);
    
        // Users
        Route::delete('users/destroy', [UserController::class,'massDestroy'])->name('users.massDestroy');
        Route::resource('users', UserController::class);

});

