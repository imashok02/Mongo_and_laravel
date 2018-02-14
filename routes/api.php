<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('apiaccess')->group(function () {

	Route::get('/test', 'AuthenticationController@test');


Route::post('/log', 'AuthenticationController@login');
Route::post('/out', 'AuthenticationController@logout');

// profile routes

Route::get('/user', 'UserController@index');

Route::post('/user', 'UserController@store');

Route::get('/user/{id}', 'UserController@show');

Route::post('/user/{id}', 'UserController@update');

Route::DELETE('/user', 'UserController@delete');

Route::post('/user/{id}/attach', 'UserController@attach');
Route::get('/user/{id}/relate', 'UserController@relate');


Route::get('/profile', 'ProfileController@index');

Route::post('/profile', 'ProfileController@store');

Route::get('/profile/{id}', 'ProfileController@show');

Route::post('/profile/{id}', 'ProfileController@update');

Route::DELETE('/profile', 'ProfileController@delete');

Route::post('/profile/{id}/attach', 'ProfileController@attach');


Route::get('/location', 'LocationController@index');

Route::post('/location', 'LocationController@store');

Route::get('/location/{id}', 'LocationController@show');

Route::post('/location/{id}', 'LocationController@update');

Route::DELETE('/location', 'LocationController@delete');

Route::post('/location/{id}/attach', 'LocationController@attach');


Route::get('/interestcategories', 'InterestCategoryController@index');

Route::post('/interestcategories', 'InterestCategoryController@store');

Route::get('/interestcategories/{id}', 'InterestCategoryController@show');

Route::post('/interestcategories/{id}', 'InterestCategoryController@update');

Route::DELETE('/interestcategories', 'InterestCategoryController@delete');

Route::post('/interestcategories/{id}/attach', 'InterestCategoryController@attach');


Route::get('/languages', 'LanguagesController@index');

Route::post('/languages', 'LanguagesController@store');

Route::get('/languages/{id}', 'LanguagesController@show');

Route::post('/languages/{id}', 'LanguagesController@update');

Route::DELETE('/languages', 'LanguagesController@delete');

Route::post('/languages/{id}/attach', 'LanguagesController@attach');


Route::get('/interest', 'InterestController@index');

Route::get('/interest/create', 'InterestController@create');

Route::post('/interest', 'InterestController@store');

Route::get('/interest/{id}', 'InterestController@show');

Route::post('/interest/{id}', 'InterestController@update');

Route::DELETE('/interest', 'InterestController@delete');

Route::post('/interest/{id}/attach', 'InterestController@attach');


Route::get('/events', 'EventController@index');

Route::get('/events/create', 'EventController@create');

Route::post('/events', 'EventController@store');

Route::get('/events/{id}', 'EventController@show');

Route::post('/events/{id}', 'EventController@update');

Route::DELETE('/events', 'EventController@delete');

Route::post('/events/{id}/attach', 'EventController@attach');
    
});




