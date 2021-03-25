<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//Route::group(['domain' => 'iscu.test'], function() {
//    Route::get('/', [AuthController::class, 'index']);
//
//    Route::group(['middleware' => ''], function() {
//
//    });
//});

Route::get('{any}', function() {
    return view('index');
})->where('any', '.*');
