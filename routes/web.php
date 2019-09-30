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

Route::prefix('books')->group(function () {
    Route::get('download/{id}', 'SiteController@download')->name('download');
    Route::get('search_author', 'SiteController@searchBooksAuthor')->name('search.books.author');
    Route::get('search_category', 'SiteController@searchBooksCategory')->name('search.books.category');
});

Route::prefix('authors')->group(function () {
    Route::get('/', 'SiteController@authors')->name('authors');
    Route::get('{id}', 'SiteController@showAuthor')->name('show.author');
});

Route::prefix('categories')->group(function () {
    Route::get('/', 'SiteController@categories')->name('categories');
    Route::get('{category}', 'SiteController@filesByCategory')->name('filesByCategory');
});


Route::group(['middleware' => 'auth','namespace' => 'Admin','prefix'=>'admin'], function()
{
    Route::resources([
        'books' => 'BookController',
        'authors' => 'AuthorController',
        'categories' => 'CategoryController'
    ],
        ['except' => ['show', 'index']]
    );
});
