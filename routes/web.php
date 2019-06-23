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
    $image = \App\ImageModel::latest()->first();
    return view('welcome',compact('image'));
});

Route::get('locale', function () {
    // return \App::getLocale();
    return view('locale');
})->name('locale');

Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
})->name('change.locale');

Auth::routes();

Route::get('/home/changeImage', 'HomeController@changeImage')->name('image.change');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('create','ImageController@store')->name('image.store');

Route::get('/courses/first', 'CourseController@firstCourse')->name('courses.first');
Route::get('/courses/{course}/apply', 'CourseController@apply')->name('courses.apply');
Route::post('/courses/deleteApplication', 'CourseController@deleteApplication')->name('courses.deleteApplication');
Route::resource('/courses', 'CourseController');

Route::resource('/users', 'UserController')->except(['create']);
// Route::resource('/users', 'UserController')->only(['index','show','store']);
