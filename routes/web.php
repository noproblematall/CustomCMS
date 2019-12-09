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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/setting', 'HomeController@setting')->name('setting');
Route::post('/setting','HomeController@user_setting')->name('user_setting');

// Data processing
Route::get('/inputdata', 'DataEdit@index')->name('inputdata');
Route::post('isian', 'DataEdit@isian_edit')->name('isian_edit');
Route::post('mengisi', 'DataEdit@mengisi_edit')->name('mengisi_edit');
Route::post('pakan', 'DataEdit@pakan_edit')->name('pakan_edit');
Route::get('column_name','DataEdit@column_name')->name('column_name');
Route::get('core_search','DataEdit@core_search')->name('core_search');

// Auto Save
Route::get('isian', 'DataEdit@isian_single_edit')->name('isian_single_edit');
Route::get('mengisi', 'DataEdit@mengisi_single_edit')->name('mengisi_single_edit');
Route::get('pakan', 'DataEdit@pakan_single_edit')->name('pakan_single_edit');

// Activity
Route::get('/activity', 'ActivityController@index')->name('activity');

// Route For Only SuperAdmin
Route::group([
    'middleware' => 'super',
    'prefix' => 'super'
], function ($router) {
    Route::get('/user', 'HomeController@user')->name('user');
    Route::post('adduser', 'HomeController@adduser')->name('adduser');
    Route::get('/useredit/{id}', 'HomeController@useredit')->name('useredit');
    Route::post('/user_edit', 'HomeController@user_edit')->name('user_edit');
    Route::get('/userdelete/{id}', 'HomeController@userdelete')->name('userdelete');

    // Search
    Route::get('/search', 'DataEdit@search')->name('search');
    Route::post('/admin_search', 'DataEdit@admin_search')->name('admin_search');
});

// Route For User
Route::get('/userinput', 'DataEdit@user_inputdata')->name('user.inputdata');
Route::get('/user_datasearch', 'DataEdit@user_datasearch')->name('user.datasearch');

