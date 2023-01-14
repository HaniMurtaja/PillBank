<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::post('/forgotPassword', [UserController::class, 'forgotPassword']);
Route::post('/profile', [UserController::class, 'profile']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/changePassword', [UserController::class, 'changePassword']);
Route::post('/editProfile', [UserController::class, 'editProfile']);
Route::post('/getMyNotifications', [UserController::class, 'getMyNotifications']);


Route::apiResource('reminders', ReminderController::class);

