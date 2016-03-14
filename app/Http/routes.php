<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/', "IndexController@goIndex");
    Route::get('/logout', "IndexController@logout");
    Route::get('/users', "IndexController@goUser");
    Route::get('/user/{id}', "UserController@editUser");
    Route::get('/assignpermission/{userid}/{key}/{name}', "UserController@assignPermission");
    Route::get('/resetpassword/{id}', "UserController@resetPassword");
    Route::get('/getallusers', "UserController@getAllUser");
    Route::get('/dashboard', "IndexController@goDashboard");
    Route::get('/artefacts', "DashboardController@getAllArtefactTypes");
    Route::get('/validate/{username}/{password}', "IndexController@loginValidate");
});
