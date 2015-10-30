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

Route::get('cdma/apply',['as'=>'cdma.apply','uses'=>'CdmaApplyController@index']);
Route::resource('cdma/apply','CdmaApplyController');

Route::resource('cdma/manager','CdmaController');
Route::post('cdma/list','UploadController@cdma');

/*Route::resource('mobile','MobileController');
Route::post('upload/mobile','UploadController@mobile');
*/
Route::resource('employee','EmployeeController');
Route::post('upload/employee','UploadController@employee');

Route::resource('task','TaskController');