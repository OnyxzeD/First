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

Route::match(['get', 'post'], '/', function () {
    return 'Hello World';
});

Route::get('user/{id}/{name}', function ($id, $name) {
    return 'Hallo : ' . $name . ' / ' . $id;
})
    ->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


Route::get('user/profile', ['as' => 'profile', function ($id = '17-08-1945') {
    return 'Default ID : [' . $id . ']';
}]);

Route::get('user/profile/{id}', ['as' => 'profile', function ($id) {
    return 'Welcome [' . $id . ']';
}]);

$url = route('profile', ['id' => 1]);

// ROUTE GROUP
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/admin', ['uses' => 'AdminController@index']);
});
Route::group(['namespace' => 'Guest'], function () {
    Route::get('/guest', ['uses' => 'AdminController@index']);
});

//  ROUTE PREFIX
Route::group(['prefix' => 'admin'], function () {
    Route::get('users', function ()    {
        return 'Berhasil, ROUTE PREFIX';
    });
});

*/


Route::group(['namespace' => 'Admin'], function () {
    Route::resource('admin', 'AdminController');
});

Route::group(['namespace' => 'Guest'], function () {
    Route::resource('guest', 'GuestController');
});

Route::group(['namespace' => 'User'], function () {
    Route::resource('user', 'UserController');
});

Route::get('/view/{name?}', 'SiteController@jawab');