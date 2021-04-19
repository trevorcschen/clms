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



Auth::routes(['verify' => true]);



Route::get('/', 'HomeController@index')->name('home');;

Route::resource('users','UserController');
Route::resource('roles','RoleController');
Route::resource('programmes','ProgrammeController');
Route::resource('subjects', 'SubjectController');
Route::resource('sessions', 'SessionController');
Route::resource('course_listings', 'CourseListingController');



Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('ajax/users', 'UserController@ajax')->name('ajax.users');
Route::get('ajax/roles', 'RoleController@ajax')->name('ajax.roles');
Route::get('ajax/programmes/{id}', 'ProgrammeController@ajax')->name('ajax.programmes');
Route::get('ajax/programmes', 'ProgrammeController@ajaxDetails')->name('ajaxDetails.programmes');
Route::get('ajax/subjects', 'SubjectController@ajax')->name('ajax.subjects');
Route::get('ajax/sessions', 'SessionController@ajax')->name('ajax.sessions');
Route::get('/programmes/{id}/index', 'ProgrammeController@index')->name('programmes.index');
Route::get('/programmes/', 'ProgrammeController@details')->name('programmes.details');
Route::get('/course_listings/createDetails/{id}', 'CourseListingController@createDetails')->name('course_listings.createDetails');
Route::post('/course_listings/storeDetails.php', 'CourseListingController@storeDetails')->name('course_listings.storeDetails');
Route::get('/course_listings/search/', 'CourseListingController@search')->name('course_listings.search');
Route::post('api/subjects', 'SubjectController@populatedFields')->name('api.populatedData');
Route::post('api/listings', 'CourseListingController@listingFields')->name('api.listingFields');
//Route::post('api/listings/validateListings', 'CourseListingController@validateListingDetails')->name('api.validateListingDetails');
Route::post('api/listings/validateListing', 'CourseListingController@validateListing')->name('api.validateListing');



