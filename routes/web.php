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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@userid');

//Category

Route::resource('category', 'CategoryController');

//Cars

Route::resource('car', 'CarController');

//Posts
Route::resource('posts', 'PostsController');

Route::get('/search', 'PostsController@search');

Route::resource('people', 'PeopleController');

Route::get('/home', 'HomeController@index')->name('home');

//many to many tags

//Route::get('/search', 'StudentController@search');

Route::resource('courses', 'CourseController')->middleware('auth');

Route::resource('students', 'StudentController')->middleware('auth');

Route::resource('users', 'UsersController')->middleware('auth');

