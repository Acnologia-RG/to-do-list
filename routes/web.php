<?php

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

Route::get('/', function () {
	return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/newList', 'ToDoListController@newList')->middleware('auth');

Route::post('/createNewList', 'ToDoListController@createNewList')->middleware('auth');

Route::get('/yourLists', 'ToDoListController@index')->middleware('auth');

Route::get('/newListItem/{id}', 'ToDoListController@newListItem')->middleware('auth');

Route::post('/createNewListItem', 'ToDoListController@createNewListItem')->middleware('auth');

Route::get('/deleteList/{id}', 'ToDoListController@destroyList')->middleware('auth');

Route::get('/deleteListItem/{id}', 'ToDoListController@destroyListItem')->middleware('auth');

Route::get('/editListItem/{id}', 'ToDoListController@editListItem')->middleware('auth');

Route::get('/editList/{id}', 'ToDoListController@editList')->middleware('auth');

Route::post('/updateListItem', 'ToDoListController@updateListItem');

Route::post('/updateList', 'ToDoListController@updateList');

Route::post('/yourList/update', 'ToDoListController@updateStatus');
// im kinda cheating on this last one as its done in the wrong way
// but i could not get the other way working as it should