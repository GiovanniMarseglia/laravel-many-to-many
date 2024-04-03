<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProjectController as ProjectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

    //localhost:8000/dashboard/posts
    Route::resource('project', ProjectController::class);
    // ->parameters(['project'=>'post:slug']);

});



