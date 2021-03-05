<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [EditorController::class, 'form'])->name('form');
Route::post('/publish', [EditorController::class, 'publish'])->name('publish');
Route::get('/download', [EditorController::class, 'download'])->name('download');