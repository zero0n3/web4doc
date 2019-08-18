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


//Route::get('/lsearch', 'LSearchController@index');
//Route::get('/lsearch/action', 'LSearchController@action')->name('lsearch.action');
//Route::get('search', 'SearchController@index')->name('search');
//Route::post('result', 'SearchController@search')->name('result');
//Route::get('/live_search', 'LiveSearchController@index');
//Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');
//Route::get('/pagination', 'PaginationController@index');
//Route::get('/pagination/fetch_data', 'PaginationController@fetch_data');

// GESTIONE COMPANY SOCIETA TEAM
// #fattoamano
//Route::get('/company', 'CompanyController@index');   //-> qui uso il comando per creare un Controller da riga di comando
//Route::get('/company/search','CompanyController@search')->name('search');
//v2
Route::resource('/team', 'TeamController');


// GESTIONE SPORTS
// #fattoamano
//Route::get('/sport', 'SportController@index');   //-> qui uso il comando per creare un Controller da riga di comando
//v2
Route::resource('/sport', 'SportController');


// GESTIONE ATHLETES
// #fattoamano
//Route::get('/athlete/{id}/dashboard', 'AthleteController@show')->name('athlete.dashboard'); 
//v2 
Route::resource('/athlete', 'AthleteController');
//Route::get('/athlete', 'AthleteController@index');   //-> qui uso il comando per creare un Controller da riga di comando



// GESTIONE CHECKUPS
// #fattoamano
Route::get('/checkup/{id}/add', 'CheckupController@add')->name('checkup.add');
Route::resource('/checkup', 'CheckupController');
//Route::get('/checkup', 'CheckupController@index');   //-> qui uso il comando per creare un Controller da riga di comando


// #fattoamano
Route::get('/', 'AthleteController@index');   //-> qui uso il comando per creare un Controller da riga di comando


Route::get('/teams', function(){

	return Team::all();

});   //-> route di prova per vedere i dati json di company (o altro)

// questo lo passo al welcome Controller
Route::get('/{name?}/{lastname?}', 'WelcomeController@welcome')

/*
Route::get('/{name?}/{lastname?}', function ($name = '', $lastname = '') {  // ? indica che è opzionale
    return "hello ".$name." ".$lastname;
})	*/
	//1 metodo
	//->where('name','[a-zA-Z]+')
	//->where('lastname','[a-zA-Z]+')
	
	//2 metodo
	-> where([
		'name' => '[a-zA-Z]+',
		'lastname' => '[a-zA-Z]+'

	]);

	
