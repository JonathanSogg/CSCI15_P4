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
Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('/');
});
 
Route::filter('nonauth', function()
{
    if (Auth::guest() == false) return Redirect::to('photopage');
});

Route::get('/', function() 
{
	return View::make('home.index');
});

Route::get('about', function() 
{
	return View::make('home.about');
});

Route::get('photopage', function()
{
    $pictures = Auth::user()->pictures()->orderBy('created_at', 'desc')->get();
    return View::make('photopage.index', array('pictures' => $pictures));
});

Route::get('upload', function()
{
    return View::make('uploads.uploadForm');
});

Route::post('upload', 'PictureController@postUpload');

Route::post('authenticate', 'UserController@authenticate');
