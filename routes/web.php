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

Route::get('/','QuestionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questions', 'QuestionController');
Route::resource('users', 'ProfileController')->only(['show','edit','update']);
Route::resource('questions.answers', 'AnswerController');
Route::post('/questions/{answer}/accept' , 'QuestionController@accept_answer')->name('questions.accept-answer');
Route::post('/questions/{question}/favorite' , 'FavoriteController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorite' , 'FavoriteController@destroy');
Route::post('/questions/{question}/vote' , 'VoteController@vote_question');
Route::post('/answers/{answer}/vote' , 'VoteController@vote_answer');
