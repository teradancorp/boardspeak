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

Route::get('/', 'BoardController@index');
Route::get('/board/create', 'BoardController@createboard');
Route::post('/board/summary', 'BoardController@summary');
Route::post('/board/update/{id}', 'BoardController@update');
Route::post('/board/save', 'BoardController@saveboard');
Route::post('/board/join/{user_id}/{board_id}/{public}/{link_id}', 'BoardController@joinboard');
Route::get('/board/discussion/{link_id}', 'BoardController@discussion')->name('discussion');
Route::get('/board/edit/{id}', 'BoardController@edit');
Route::get('/defaultCover/{type}', 'BoardController@defaultcover');
Route::get('/board/memberList/{type}/{board}', 'BoardController@memberList');

Route::get('/post/create/{link_id}', 'PostController@createpost');
Route::post('/post/save/{link_id}', 'PostController@save');
Route::get('/post/discussion/{link_id}', 'PostController@discussion')->name('comments');
Route::post('/post/postComment', 'PostController@postComment');
Route::post('/post/postReplies', 'PostController@postReplies');

Route::get('/member/home', 'MemberController@index')->name('member');
Route::get('/member/register', 'MemberController@registration')->name('newUser');
Route::post('/member/register', 'MemberController@doRegister');
Route::post('/member/checkEmail', 'MemberController@checkEmail');
Route::post('/member/doneStep2', 'MemberController@doneStep2')->name('doneStep2');
Route::get('/getCountries/{code}', 'MemberController@getCountries');
Route::get('/getCities/{city}/{code}', 'MemberController@getCities');

Route::get('/user/profile', 'UserController@profile')->name('userProfile');
Route::post('/user/avatar', 'UserController@update_avatar');


Auth::routes();
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');
