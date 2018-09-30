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


Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('doctors/data', 'DoctorsController@dataIndex')->name('doctors.data');
    Route::resource('doctors', 'DoctorsController');
    Route::get('patients/data', 'PatientsController@dataIndex')->name('patients.data');
    Route::resource('patients', 'PatientsController');
    Route::get('schedules/data', 'SchedulesController@dataIndex')->name('schedules.data');
    Route::resource('schedules', 'SchedulesController');
    Route::get('users/data', 'UsersController@dataIndex')->name('users.data');
    Route::resource('users', 'UsersController');

});
