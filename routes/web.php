<?php

use App\Models\Company;

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

// GESTIONE COMPANY SOCIETA
// #fattoamano
//Route::get('/company', 'CompanyController@index');   //-> qui uso il comando per creare un Controller da riga di comando
//Route::get('/company/search','CompanyController@search')->name('search');
Route::resource('/company', 'CompanyController');


// GESTIONE SPORTS
// #fattoamano
//Route::get('/sport', 'SportController@index');   //-> qui uso il comando per creare un Controller da riga di comando
Route::resource('/sport', 'SportController');

// GESTIONE TEAMS
// #fattoamano
//Route::get('/team', 'TeamController@index');   //-> qui uso il comando per creare un Controller da riga di comando
Route::resource('/team', 'TeamController');

// GESTIONE ATHLETES
// #fattoamano
Route::resource('/athlete', 'AthleteController');
//Route::get('/athlete', 'AthleteController@index');   //-> qui uso il comando per creare un Controller da riga di comando

// GESTIONE CHECKUPS
// #fattoamano
Route::get('/checkup', 'CheckupController@index');   //-> qui uso il comando per creare un Controller da riga di comando


// #fattoamano
Route::get('/', 'CompanyController@index');   //-> qui uso il comando per creare un Controller da riga di comando


Route::get('/companys', function(){

	return Company::all();

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

	
