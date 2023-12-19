<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\GiftCardController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/{any}', [AppController::class, 'index'])->where('any', '.*');
Route::get('/', function () {
    return view('app');
});

Route::get('/pdf', [GiftCardController::class, 'generate']);
