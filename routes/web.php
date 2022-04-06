<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\HellowWorldController;

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

Route::get('/', [SampleController::class, 'index'])->name('welcome');

Route::get('/hellow', [HellowWorldController::class, 'index'])->name('hellow.world');
Route::post('/hellow', [HellowWorldController::class, 'store'])->name('hellow.world');
