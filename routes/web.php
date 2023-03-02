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
    'prefix' => 'books'
], function () {
    Route::get('/update/{id}','App\Http\Controllers\BookController@update')->name('updateBook')->middleware('auth');;
    Route::post('/update/{id}','App\Http\Controllers\BookController@save')->name('saveBook')->middleware('auth');
    Route::get('/delete/{id}','App\Http\Controllers\BookController@delete')->name('deleteBook')->middleware('auth');
    Route::get('/editOwnBooks/{id}','App\Http\Controllers\BookController@editOwnBooks')->name('editOwnBooks')->middleware('auth');
    Route::get('/store', function () {
        return view('store');
    })->name('addNewBook')->middleware('auth');
    Route::get('/myBooks/{id}','App\Http\Controllers\BookController@myBooks')->name('myBooks')->middleware('auth');
    Route::get('/store/{id}', function () {
        return view('books.store');
    })->name('addAuthorBook')->middleware('auth');

    Route::post('/store/{id}','App\Http\Controllers\BookController@storeBook')->name('saveAuthorBook')->middleware('auth');

    Route::post('/store','App\Http\Controllers\BookController@store')->name('addNewBook')->middleware('auth');
    Route::get('/show/{id}', function () {
        return view('show');
    })->name('oneBook');
    Route::get('/show/{id}','App\Http\Controllers\BookController@show')->name('oneBook');
});

Route::group([
    'prefix' => 'authors'
], function () {
    Route::get('/update/{id}','App\Http\Controllers\AuthorController@update')->name('updateAuthor')->middleware('auth');
    Route::post('/update/{id}','App\Http\Controllers\AuthorController@saveAuthor')->name('saveAuthor')->middleware('auth');
    Route::get('/delete/{id}','App\Http\Controllers\AuthorController@delete')->name('deleteAuthor')->middleware('auth');
    Route::post('/addAuthor','App\Http\Controllers\AuthorController@store')->name('saveNewAuthor')->middleware('auth');
    Route::get('/index','App\Http\Controllers\AuthorController@index')->name('allAuthors');
    Route::get('/show/{id}', function () {
        return view('show');
    })->name('oneAuthor');
    Route::get('/show/{id}','App\Http\Controllers\AuthorController@show')->name('oneAuthor');
});

Route::group([
    'prefix' => 'comments'
], function () {
    Route::get('/update/{book}/comment/{id}','App\Http\Controllers\CommentController@update')->name('updateComment')->middleware('auth');
    Route::post('/update/{book}/comment/{id}','App\Http\Controllers\CommentController@store')->name('saveComment')->middleware('auth');
    Route::get('/delete/{book}/comment/{id}','App\Http\Controllers\CommentController@delete')->name('deleteComment')->middleware('auth');
    Route::post('/show/{id}','App\Http\Controllers\CommentController@save')->name('addComment');
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
