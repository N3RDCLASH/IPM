<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
	return redirect('home');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


	//store the save
	Route::post('/student', [App\Http\Controllers\UserController::class, 'storeStudent']);

	//store the save User
	Route::post('/admin', [App\Http\Controllers\UserController::class, 'storeUser']);


	Route::get('Student/Delete/{id}', [App\Http\Controllers\UserController::class, 'destroyStudent']);
	Route::get('Student/Update/{id}', [App\Http\Controllers\UserController::class, 'updatest']);


	Route::get('user/Delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
	Route::get('user/Update/{id}', [App\Http\Controllers\UserController::class, 'updateus']);
	Route::get('user/view/{id}', [App\Http\Controllers\UserController::class, 'showid']);




	Route::post('Student/Update/{id}', [App\Http\Controllers\UserController::class, 'update_st']);
	Route::post('user/Update/{id}', [App\Http\Controllers\UserController::class, 'update_us']);


	Route::get('/Student/view/{id}', [App\Http\Controllers\UserController::class, 'showStudent']);



	Route::resource('services', 'App\Http\Controllers\ServicesController')->name('index', 'services');
	Route::resource('users', 'App\Http\Controllers\UserController')->name('index', 'users');
	Route::resource('klassen', 'App\Http\Controllers\KlasController')->name('index', 'klassen');
	Route::resource('richtingen', 'App\Http\Controllers\RichtingController')->name('index', 'richtingen');
	Route::resource('studentklas', 'App\Http\Controllers\StudentKlasController');

	Route::get('/saldo', [App\Http\Controllers\SaldoController::class, 'index'])->name('saldo');
	Route::post('/opwaarderen', [App\Http\Controllers\SaldoController::class, 'saldoOpwaarderen'])->name('opwaarderen');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::post('services/download', ['as' => 'services.download', 'uses' => 'App\Http\Controllers\ServicesController@downloadFile']);
	Route::post('opwaardering/accept/{opwaardering_id}', ['as' => 'opwaardering.accept', 'uses' => 'App\Http\Controllers\SaldoController@opwaarderingAccepteren']);
	Route::post('opwaarderen/decline/{opwaardering_id}', ['as' => 'opwaardering.decline', 'uses' => 'App\Http\Controllers\SaldoController@opwaarderingAfkeuren']);
});
