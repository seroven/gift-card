<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
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

Route::post('/auth', [AuthController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/gift-card/all', [GiftCardController::class, 'all']);
    Route::post('/gift-card/create', [GiftCardController::class, 'create']);
    Route::post('/gift-card/update/{id}', [GiftCardController::class, 'update']);
    Route::post('/gift-card/delete/{id}', [GiftCardController::class, 'delete']);
    Route::get('/gift-card/generateCode', [GiftCardController::class, 'generateCode']);

    Route::get('/status/all', [StatusController::class, 'all']);

    Route::get('/user/all', [UserController::class, 'all']);
    Route::post('/user/create', [UserController::class, 'create']);
    Route::post('/user/delete/{id}', [UserController::class, 'delete']);
});
