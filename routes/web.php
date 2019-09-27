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

Route::get('/', 'SiteController@index')->name('index');
Route::get('/book/download/{id}', 'SiteController@download')->name('download');
Route::get('/book/{id}', 'SiteController@showBook')->name('show.book');
Route::get('/author/{id}', 'SiteController@showAuthor')->name('show.author');

Route::group(['middleware' => 'auth','namespace' => 'Admin','prefix'=>'admin'], function()
{
    Route::get('/', 'AdminController');

    Route::resources([
        'book' => 'BookController',
        'author' => 'AuthorController'
    ],
        ['except' => ['show']]
    );
});
