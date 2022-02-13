<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
Route::get('/', 'HomeController@index')->name('home');
Route::get('/route/{id}', 'RouteController@index')->name('route');
Route::get('/route', 'RouteController@SearchByName')->name('route.search');
Route::get('/reservation/{userId}', 'ReservationController@index')->name('user.reservation');
Route::post('/reservation/{time}', 'ReservationController@create')->name('reservation');
});

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
     Route::get('/ignore/{id}', 'admin\ReservationController@ignore')->name('admin.ignore');
     Route::get('/active/{id}', 'admin\ReservationController@active')->name('admin.active');
     Route::get('/add', 'admin\RouteController@get')->name('admin.add.route');
     Route::post('/add', 'admin\RouteController@create')->name('admin.add.route');
     Route::post('/reservation','admin\ReservationController@SerachByCode')->name('admin.reservation.search');
   }) ;
