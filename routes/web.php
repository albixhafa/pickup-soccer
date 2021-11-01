<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/about', function(){
	return view('about');
});

Route::get('/news', function(){
	return view('news');
});

Route::group(['middleware'=>'theAdmin'], function(){
    Route::get('/onlyme', function(){
        return view('onlyme.index');
	});

	// Route::resource('onlyme/ages', 'AgeController');
	Route::resource('onlyme/status', 'StatusController');
	Route::resource('onlyme/roles', 'RoleController');
	Route::resource('onlyme/genders', 'GenderController');
	Route::resource('onlyme/teamgenders', 'TeamGenderController');
	Route::resource('onlyme/formats', 'FormatController');
	Route::resource('onlyme/sizes', 'SizeController');
	Route::resource('onlyme/users', 'UserController');
	Route::resource('onlyme/teams', 'TeamController');
	Route::resource('onlyme/posts', 'PostController');
	Route::resource('onlyme/comment', 'UserCommentController');

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'MainpageController@index');
	Route::get('/item/{id}', 'MainpageController@item');
	Route::post('/item/join/{id}', 'MainpageController@play');
	Route::post('/item/unjoin/{id}', 'MainpageController@unplay');
	Route::resource('/profile', 'UserProfileController');
	Route::resource('/post', 'UserPostController');
	Route::resource('/comment', 'UserCommentController');
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});