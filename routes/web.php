<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/','App\Http\Controllers\BookController@index')->name('allData');

Route::get('/addAuthor', function () {
    return view('authors.addAuthor');
})->name('addAuthor');

Route::group([
    'prefix' => 'books',
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::get('/update/{id}','BookController@update')->name('updateBook')->middleware('auth');;
    Route::post('/update/{id}','BookController@save')->name('saveBook')->middleware('auth');
    Route::get('/delete/{id}','BookController@delete')->name('deleteBook')->middleware('auth');
    Route::get('/editOwnBooks/{id}','BookController@editOwnBooks')->name('editOwnBooks')->middleware('auth');
    Route::get('/store', function () {
        return view('store');
    })->name('addNewBook')->middleware('auth');
    Route::get('/myBooks/{id}','BookController@myBooks')->name('myBooks')->middleware('auth');
    Route::get('/store/{id}', function () {
        return view('books.store');
    })->name('addAuthorBook')->middleware('auth');

    Route::post('/store/{id}','BookController@storeBook')->name('saveAuthorBook')->middleware('auth');

    Route::post('/store','BookController@store')->name('addNewBook')->middleware('auth');
    Route::get('/show/{id}', function () {
        return view('show');
    })->name('oneBook');
    Route::get('/show/{id}','BookController@show')->name('oneBook');
});

Route::group([
    'prefix' => 'authors',
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::get('/update/{id}','AuthorController@update')->name('updateAuthor')->middleware('auth');
    Route::post('/update/{id}','AuthorController@saveAuthor')->name('saveAuthor')->middleware('auth');
    Route::get('/delete/{id}','AuthorController@delete')->name('deleteAuthor')->middleware('auth');
    Route::post('/addAuthor','AuthorController@store')->name('saveNewAuthor')->middleware('auth');
    Route::get('/index','AuthorController@index')->name('allAuthors');
    Route::get('/show/{id}', function () {
        return view('show');
    })->name('oneAuthor');
    Route::get('/show/{id}','AuthorController@show')->name('oneAuthor');
});

Route::group([
    'prefix' => 'comments',
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::get('/update/{book}/comment/{id}','CommentController@update')->name('updateComment')->middleware('auth');
    Route::post('/update/{book}/comment/{id}','CommentController@store')->name('saveComment')->middleware('auth');
    Route::get('/delete/{book}/comment/{id}','CommentController@delete')->name('deleteComment')->middleware('auth');
    Route::post('/show/{id}','CommentController@save')->name('addComment');
});

Route::get('/store', function () {
    return view('store');
})->name('addBook')->middleware('auth');

Route::get('/login', function () {
    if(Auth::check()) {
        return redirect(route('allData'));
    }
    return view('login');
})->name('login');

Route::post('/login','App\Http\Controllers\LoginController@login')->name('login_post');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('allData'));
})->name('logout');

Route::get('/register', function () {
    if(Auth::check()) {
        return redirect(route('allData'));
    }
    return view('register');
})->name('register');

Route::post('/register','App\Http\Controllers\RegisterController@save')->name('register_post');
