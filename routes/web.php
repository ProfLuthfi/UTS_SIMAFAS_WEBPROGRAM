<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\UserController;





Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class);
Route::resource('fasilitas', FasilitasController::class);

// coba EXPORT PDF DAN EXCEL pak,Berhasil
Route::get('/pdf', [FasilitasController::class, 'pdf'])->name('generate-pdf');
Route::get('/generate-excel', [FasilitasController::class, 'excel'])->name('generate-excel');
/*
GET|HEAD        users ................................................... users.index › UserController@index
POST            users ................................................... users.store › UserController@store
GET|HEAD        users/create .......................................... users.create › UserController@create
GET|HEAD        users/{user} .............................................. users.show › UserController@show
PUT|PATCH       users/{user} .......................................... users.update › UserController@update
DELETE          users/{user} ........................................ users.destroy › UserController@destroy
GET|HEAD        users/{user}/edit ......................................... users.edit › UserController@edit

*/
