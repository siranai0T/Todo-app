<?php

use App\Http\Controllers\SampleController;
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

Route::get('/', [SampleController::class, 'index'])->name('welcome');

Route::get('/hello', [HelloWorldController::class, 'index'])->name('hello.world');
Route::post('/hello', [HelloWorldController::class, 'store'])->name('hello.world');

//Route::view('/hello', 'hello-world')->name('hello.world');

Route::resource('todos', TodoController::class);
