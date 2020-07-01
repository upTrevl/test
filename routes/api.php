<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/activity/join','Api\ActivityController@joinUser');
    Route::get('/activity/users','Api\ActivityController@getUsers')->name('activity.users.get');
    Route::get('/activity/leave','Api\ActivityController@leaveUser');
    Route::resource('/activity', 'Api\ActivityController');
    Route::resource('/user', 'Api\UserController');
    Route::resource('/city', 'Api\UserController');

});
