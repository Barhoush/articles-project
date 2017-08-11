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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware'  =>  'web'], function (){
    Route::get('/{category?}', [
        'uses'  =>  'HomeController@index',
        'as'    =>  'articles.home',
    ]);
    Route::get('article/{id}', [
        'uses'  =>  'HomeController@showArticle',
        'as'    =>  'articles.show'
    ]);

});

