<?php


use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PassportUsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);


Route::get('/user', [PassportUsersController::class, 'index']);
Route::get('/user/{user}', [PassportUsersController::class, 'show']);
Route::middleware('auth:api')->group(function () {
    Route::post('/user/create', [PassportUsersController::class, 'store']);
    Route::put('/user/update/{user}', [PassportUsersController::class, 'update']);
    Route::delete('/user/delete/{user}', [PassportUsersController::class, 'destroy']);
});


