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
Route::resource('questions', 'QuestionsController');

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
