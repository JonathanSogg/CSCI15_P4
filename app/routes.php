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
    if (Auth::guest()) return Redirect::to('home');
});
 
Route::filter('nonauth', function()
{
    if (Auth::guest() == false) return Redirect::to('photopage');
});

Route::get('/', function() 
{
	return View::make('index');
});

Route::get('about', function() 
{
	return View::make('about');
});

Route::get('photopage', function()
{
    $pictures = Auth::user()->pictures()->orderBy('created_at', 'desc')->orderBy('id', 'desc')->get();
    return View::make('photopage.index', array('pictures' => $pictures));
});

Route::post('authenticate', 'UserController@authenticate');
