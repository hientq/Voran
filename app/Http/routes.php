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
Route::get('/questions/solved/{question}/{answer}', 'QuestionsController@solved');
Route::resource('questions', 'QuestionsController');

/*
 * Answer Routes
 */
Route::get('/answers/create/{question}', 'AnswersController@create');
Route::post('/answers/create/{question}', 'AnswersController@store');
Route::get('/answers/create/{question}/{answer}', 'AnswersController@edit');
Route::patch('/answers/create/{question}/{answer}', 'AnswersController@update');

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
