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



Route::prefix('admin')->namespace('Back')->group(function () {

    Route::name('admin')->get('/', 'AdminController@index');

    Route::post('/registerjson', 'RegisterController@registerJson')->name('registerjson');

    Route::get('/entreprises', 'EntrepriseController@index')->name('entreprises.index');
    Route::get('/entreprises/create', 'EntrepriseController@create')->name('entreprises.create');
    Route::post('/entreprises/create', 'EntrepriseController@store')->name('entreprises.store');
    Route::get('/entreprises/show/{id}', 'EntrepriseController@show')->name('entreprises.show');
    Route::get('/entreprises/edit/{id}', 'EntrepriseController@edit')->name('entreprises.edit');
    Route::put('/entreprises/update/{id}', 'EntrepriseController@update')->name('entreprises.update');
    Route::get('/entreprises/delete/{id}', 'EntrepriseController@destroy')->name('entreprises.delete');

    Route::get('/contacts', 'ContactController@index')->name('contacts.index');
    Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');
    Route::post('/contacts/create', 'ContactController@store')->name('contacts.store');
    Route::get('/contacts/show/{id}', 'ContactController@show')->name('contacts.show');
    Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('contacts.edit');
    Route::put('/contacts/update/{id}', 'ContactController@update')->name('contacts.update');
    Route::get('/contacts/delete/{id}', 'ContactController@destroy')->name('contacts.delete');

    Route::post('/contacts/create/json', 'ContactController@storetojson')->name('contacts.storejson');
    //JSON
    Route::post('/employees/addcontact/json', 'EmployeeController@addcontact')->name('employees.addcontact');

    Route::get('/employees/delete/{id}', 'EmployeeController@destroy')->name('employees.delete');
    Route::get('/employees/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
    Route::put('/employees/update/{id}', 'EmployeeController@update')->name('employees.update');
    Route::get('/employees/create/{id}', 'EmployeeController@create')->name('employees.create');
    Route::post('/employees/store', 'EmployeeController@store')->name('employees.store');

    Route::get('/contacts/{id}/dossiers/create', 'ContactController@create_document')->name('create_document_employee');
    Route::get('/contacts/{id}/dossiers/create', 'DossierController@dossiers_employees_create')->name('create.document.employee.show');
    Route::post('/contacts/{id}/dossiers/create', 'DossierController@dossiers_employees_store')->name('create.document.employee.store');

    Route::post('/dossiers/create/entreprises/json', 'DossierController@dossiers_entreprises_store')->name('dossiers.storejson.entreprises');

    Route::post('/activites/create', 'ActiviteController@store')->name('activites.store');
    Route::get('/activites/delete/{activite_id}/{dossier_id}', 'ActiviteController@destroy')->name('activites.delete');
    Route::put('/activites/edit/{id}', 'ActiviteController@update')->name('activites.edit');
    Route::post('/activites/storebyjson', 'ActiviteController@storebyjson')->name('activites.storebyjson');

    Route::post('/dossiers/activites/json', 'DossierController@getActivites')->name('dossiers.activites');
    Route::get('/dossiers/delete/{dossier_id}/{entreprise_id}', 'DossierController@destroy')->name('dossiers.delete');
    Route::put('/dossiers/edit/{id}', 'DossierController@update')->name('dossiers.edit');
    Route::get('/dossiers/show/{id}', 'DossierController@show')->name('dossiers.show');

    Route::get('/documents/', 'DocumentController@index')->name('documents.index');



});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('grid');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );



