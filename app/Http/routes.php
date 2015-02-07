<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Question Routes
 */
Route::get('/', 'QuestionsController@index');
Route::get('/questions', 'QuestionsController@index');
Route::get('/questions/create', 'QuestionsController@create');
Route::get('/questions/{id}', 'QuestionsController@show');
Route::post('/questions', 'QuestionsController@store');
Route::get('/questions/{id}/edit', 'QuestionsController@edit');
Route::patch('/questions/{id}/edit', 'QuestionsController@update');

/*
 * Answer Routes
 */

/*
 * Profile Routes
 */

/*
 * Authenication Routes
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
