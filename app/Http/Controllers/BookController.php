<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $allBooks = Book::all();
        return view('welcome', compact('allBooks'));
    }

    public function show($id)
    {
        $bookInfo = Book::where('id', $id)->get();
        foreach ($bookInfo as $info) {
            $bookId = $info->book_id;
            $authorId = $info->author_id;
        }
        $comments = Comment::where('book_id', $id)->get();

        $authors = User::where('id', $authorId)->get();
        return view('books.show', compact('bookInfo', 'comments', 'authors'));
//        return view('books.show', ['bookInfo'=>$bookInfo, 'comments'=>$bookComments, 'authors'=>$user]);
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->input('name');
        $book->issue_date = $request->input('issue_date');
        $book->issue_agency = $request->input('issue_agency');
        $book->cover = $request->input('cover');
        $book->author_id = $request->input('author_id');
        $book->save();
        return redirect(route('allData'));
    }

    public function storeBook(Request $request, $id)
    {
        $book = new Book;
        $book->name = $request->input('name');
        $book->issue_date = $request->input('issue_date');
        $book->issue_agency = $request->input('issue_agency');
        $book->cover = $request->input('cover');
        $book->author_id = $id;
        $book->save();
        return redirect(route('allData'));
    }

    public function update($id)
    {
        $bookInfo = Book::where('id', $id)->get();
        return view('books.update', compact('bookInfo'));
    }

    public function save(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->issue_date = $request->input('issue_date');
        $book->issue_agency = $request->input('issue_agency');
        $book->cover = $request->input('cover');
        $book->author_id = $request->input('author_id');
        $book->save();
        return redirect(route('allData'));
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect(route('allData'));
    }

    public function editOwnBooks($id)
    {
        $bookInfo = Book::where('id', $id)->get();
        return view('books.updateBook', compact('bookInfo'));
    }

    public function myBooks($id)
    {
        $books = Book::where('author_id', $id)->get();
        return view('books.myBooks', compact('books'));
    }
}
