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

Route::get('/', function () {
    return view('welcome');
});

//Define Route
/*
 * Company Route
 */
Route::get('company',['as'=>'company','uses'=>'CompanyController@index']);
Route::resource('company','CompanyController');
/*
 * Department route
 */
Route::get('department',['as'=>'departmennt','uses'=>'DepartmentController@index']);
Route::resource('department','DepartmentController');
Route::post('/upload/department','UploadController@department');
//Define Authorized Group