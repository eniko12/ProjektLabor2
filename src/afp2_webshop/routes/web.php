<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'StaticController@showHome')->name('main');
Route::get('/contact', 'StaticController@showContact')->name('contact');
Route::get('/about', 'StaticController@showAbout')->name('about');

Route::get('/shop', 'BookController@index')->name('shop');
Route::post('/shop', 'BookController@search')->name('shop.search');
Route::post('/shop/search', 'BookController@searchMiddleware')->name('shop.search.mid');
Route::get('/shop/search', 'BookController@searchRedirect')->name('shop.search.redirect');
Route::get('/shop/search/{query}', 'BookController@searchQ')->name('shop.search.query');
Route::get('/shop/{id}', 'BookController@show')->name('shop.get')->where('id', '[0-9]+');
Route::get('/shop/filterA', 'BookController@searchAuthor')->name('shop.filter.author');
Route::get('/shop/filterG', 'BookController@searchGenre')->name('shop.filter.genre');
Route::get('/shop/filterP', 'BookController@searchPublisher')->name('shop.filter.publisher');

Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/{id}', 'CartController@show')->name('cart-id');
Route::get('/cart/add/{id}', 'CartController@add')->name('cart.add');
Route::get('/cart/add/{book_id}/{user_id}', 'CartController@add2')->name('cart.add-user');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/cart/remove/{book_id}/{user_id}', 'CartController@remove2')->name('cart.remove-user');
Route::get('/cart/edit/{book_id}/{quantity}', 'CartController@edit')->name('cart.edit');
Route::get('/cart/edit/{book_id}/{quantity}/{user_id}', 'CartController@edit2')->name('cart.edit-user');

Route::get('order', 'OrderController@index')->name('orders');
Route::get('order/place', 'OrderController@place')->name('orders.place');
Route::post('order/store', 'OrderController@store')->name('orders.store');

Route::get('/author', 'AuthorController@index')->name('author');
Route::post('/author', 'AuthorController@search')->name('author.search');
Route::get('/author/{id}', 'AuthorController@show')->name('author.get');

Route::get('/publisher', 'PublisherController@index')->name('publisher');
Route::post('/publisher', 'PublisherController@search')->name('publisher.search');
Route::get('/publisher/{id}', 'PublisherController@show')->name('publisher.get');

Route::get('/genre', 'GenreController@index')->name('genre');
Route::post('/genre', 'GenreController@search')->name('genre.search');
Route::get('/genre/{id}', 'GenreController@show')->name('genre.get');

Auth::routes();
Route::get('/profile', 'ProfileController@show')->name('profile');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
Route::get('/signout', '\App\Http\Controllers\Auth\LoginController@logout')->name('signout');

