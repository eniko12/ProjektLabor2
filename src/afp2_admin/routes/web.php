<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('home');
    }else{
        return redirect()->route('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('customers', 'UserController@index')->name('customers');
    Route::get('customer/{id}', 'UserController@show')->name('customers.show')->where('id', '[0-9]+');
    Route::get('customer/{id}/delete', 'UserController@delete')->name('customers.delete')->where('id', '[0-9]+');

    Route::get('books', 'BookController@index')->name('books');
    Route::get('books/{id}', 'BookController@show')->name('books.show')->where('id', '[0-9]+');
    Route::get('books/create', 'BookController@create')->name('books.create');
    Route::post('books/store', 'BookController@store')->name('books.store');
    Route::get('books/{id}/edit', 'BookController@edit')->name('books.edit')->where('id', '[0-9]+');
    Route::post('books/update', 'BookController@update')->name('books.update')->where('id', '[0-9]+');
    Route::get('books/{id}/delete', 'BookController@delete')->name('books.delete')->where('id', '[0-9]+');

    Route::get('orders', 'OrderController@index')->name('orders');


    //<editor-fold desc="Demo">
    Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
    //</editor-fold>
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
