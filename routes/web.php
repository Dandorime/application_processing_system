<?php

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

Route::get('/', function () { return view('welcome'); })->name('feedback');

Route::post('/send',[\App\Http\Controllers\MessageController::class, 'store']);

Route::get('/success',function(){ return view('success'); })->name('success');

Route::post('/save/{id}',[\App\Http\Controllers\MessageController::class, 'update'])->name('save');

Route::prefix('admin')->group(function () {
    Route::get('/',function() { return view('auth.login'); });

    Route::get('/bar',[\App\Http\Controllers\MessageController::class, 'index'])->name('admins');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'login'])->name('home');
