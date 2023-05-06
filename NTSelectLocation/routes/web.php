<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

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


Route::get('/', [LocationController::class, 'index']);
Route::get('get_all_district',[LocationController::class,'get_all_district'])->name('get_all_district');
Route::get('get_all_counter',[LocationController::class,'get_all_counter'])->name('get_all_counter');


// Route::get('/', function () {
//     return view('welcome');
// });

