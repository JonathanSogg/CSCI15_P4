<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('/', function() 
{
	return View::make('home.index');
});

Route::get('about', function() 
{
	return View::make('home.about');
});

Route::get('photopage', ['before' => 'auth', function()
{
    $pictures = Auth::user()->pictures()->orderBy('created_at', 'desc')->get();
    $profile = Auth::user()->user_profile()->first();
    return View::make('photopage.index', array('pictures' => $pictures, 'profile' => $profile));
}]);

Route::get('upload', ['before' => 'auth', function()
{
    return View::make('uploads.uploadForm');
}]);

Route::get('delete/{id}', ['before' => 'auth', 'uses' => 'PictureController@deletePicture', 'as'=>'delete']);

Route::get('logoff', ['before' => 'auth', 'uses' => 'UserController@logoff', 'as' => 'logoff']);

Route::post('upload', ['before' => 'auth|csrf', 'uses' => 'PictureController@postUpload']);

Route::post('profile', ['before' => 'auth|csrf', 'uses' => 'UserController@editProfile']);

Route::post('authenticate', ['before' => 'csrf', 'uses' => 'UserController@authenticate']);
