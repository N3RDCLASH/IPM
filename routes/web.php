<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/saldo', [App\Http\Controllers\SaldoController::class, 'index'])->name('saldo');



//store the save
Route::post('/student', [App\Http\Controllers\UserController::class,'storeStudent']);

//store the save User
Route::post('/admin', [App\Http\Controllers\UserController::class,'storeUser']);


Route::group(['middleware' => 'auth'], function () {

	Route::resources(
		[
			'user' => App\Http\Controllers\UserController::class,
			'service' => App\Http\Controllers\ServicesController::class
		],
		// [
		// 	"names" => [
		// 		'users' => 'user.index',
		// 		'services' => "service.index",
		// 	]
		// ]
	);

	Route::resource('services', 'App\Http\Controllers\ServicesController')->name('index', 'services');
	Route::resource('users', 'App\Http\Controllers\UserController')->name('index', 'users');
	Route::resource('klassen', 'App\Http\Controllers\KlasController')->name('index', 'klassen');
	Route::resource('studentklas', 'App\Http\Controllers\StudentKlasController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

// Route::group(['middleware' => 'auth'], function () {
// 	// Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index'],);
// });
