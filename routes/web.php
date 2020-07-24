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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// USERS
Route::get('/users', 'UsersController@index')->name('profile');
Route::get('/users/create-new', 'UsersController@create_page');
Route::post('/users/create-new', 'UsersController@create_save');
Route::get('/users/update/{users}', 'UsersController@update_page');
Route::post('/users/update/{users}', 'UsersController@update_save');

// industries
Route::get('/industries', 'IndustriesController@index')->name('index');
Route::get('/industries/create-new', 'IndustriesController@create_page')->name('create_page');
Route::post('/industries/create-new', 'IndustriesController@save_page')->name('create_page');
Route::get('/industries/update/{industries}', 'IndustriesController@update_page')->name('update');
Route::post('/industries/update/{industries}', 'IndustriesController@update_save')->name('update');

// Sources
Route::get('/sources', 'SourcesController@index')->name('index');
Route::get('/sources/create-new', 'SourcesController@create_page')->name('create_page');
Route::post('/sources/create-new', 'SourcesController@save_page')->name('create_page');
Route::get('/sources/update/{sources}', 'SourcesController@update_page')->name('update');
Route::post('/sources/update/{sources}', 'SourcesController@update_save')->name('update');

// Leads
Route::get('/leads', 'LeadsController@index')->name('index');
Route::get('/leads/create-new', 'LeadsController@create_page')->name('create_page');
Route::post('/leads/create-new', 'LeadsController@create_save')->name('create_page');
Route::get('/leads/update/{leads}', 'LeadsController@update_page')->name('update');
Route::post('/leads/update/{leads}', 'LeadsController@update_save')->name('update');

// Contacts
Route::get('/contacts', 'ContactsController@index')->name('index');
Route::get('/contacts/create-new', 'ContactsController@create_page')->name('create_page');
Route::post('/contacts/create-new', 'ContactsController@create_save')->name('save_page');
Route::get('/contacts/update/{contacts}', 'ContactsController@update_page')->name('update');
Route::post('/contacts/update/{contacts}', 'ContactsController@update_save')->name('update');

// Accounts
Route::get('/accounts', 'AccountsController@index')->name('index');
Route::get('/accounts/create-new', 'AccountsController@create_page')->name('create_page');
Route::post('/accounts/create-new', 'AccountsController@create_save')->name('create_page');
Route::get('/accounts/update/{accounts}', 'AccountsController@update_page')->name('update');
Route::post('/accounts/update/{accounts}', 'AccountsController@update_save')->name('update');


// Opportunities
Route::get('/opps', 'OppsController@index')->name('index');
Route::get('/opps/create-new', 'OppsController@create_page')->name('create_page');
Route::post('/opps/create-new', 'OppsController@create_save')->name('create_page');

Route::get('/home', 'HomeController@index')->name('home');
