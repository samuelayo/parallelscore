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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/investor/dashboard','InvestmentController@dashboard')->middleware('auth');

Route::get('/founder/dashboard','FoundersController@dashboard')->middleware('auth');

Route::get('/search/investment','InvestmentController@search_investment')->middleware('auth');

Route::get('/view/company/{id}','InvestmentController@view_company')->middleware('auth');

