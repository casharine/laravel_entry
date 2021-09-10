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
use App\Http\Middleware\HelloMiddleware;


Route::get('/', function () { 
    return view('welcome');
});

// Bord関連
Route::get('board', 'BoardController@index');

Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');


Route::resource('rest', 'RestappController');


Route::get('hello/rest', 'HelloController@rest');

Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// People関連
Route::get('person', 'PersonController@index');

Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

// // hello viewを呼び出すアクション
// Route::get('hello','HelloController@index');
// postを呼び出すアクション post(割当るアドレス, 呼び出すアクション=コントローラ@メソッド)
Route::post('hello', 'HelloController@post');
// ミドルウェアの呼び出し処理S
Route::get('hello','HelloController@index');
Route::get('hello/show','HelloController@show');

// Formの追加処理
Route::get('hello/add','HelloController@add');
Route::post('hello/add','HelloController@create');

//　Formの編集更新処理
Route::get('hello/edit','HelloController@edit');
Route::post('hello/edit','HelloController@update');

//　Formの削除処理
Route::get('hello/del','HelloController@del');
Route::post('hello/del','HelloController@remove');



