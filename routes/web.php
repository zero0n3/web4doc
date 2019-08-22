<?php

use App\Models\Team;

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

/* originale
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['middleware' => 'auth'],
    function() {
        Route::resource('/team', 'TeamController');

        Route::resource('/sport', 'SportController');

        Route::resource('/athlete', 'AthleteController');

        Route::get('/checkup/{id}/add', 'CheckupController@add')->name('checkup.add');
        Route::resource('/checkup', 'CheckupController');

        Route::get('/', 'AthleteController@index');   //-> qui uso il comando per creare un Controller da riga di comando

        Route::get('/home', 'AthleteController@index');

    });


Auth::routes();

