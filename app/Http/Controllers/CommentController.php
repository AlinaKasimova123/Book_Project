<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function save(Request $request, $id)
    {
        if (Auth::check()) {
            $comment = new Comment;
            $user = auth()->user();
            $comment->user_id = $user->id;
            $comment->comment = $request->input('comment');
            $comment->book_id = $id;
            $comment->save();
            return redirect(route('oneBook', $id));

            if ($comment) {
                return redirect(route('allData'))->withErrors([
                    'formError' => 'Произошла ошибка при создании комментария'
                ]);
            }
        } else {
            $comment = new Comment;
            $comment->user_id = 4;
            $comment->comment = $request->input('comment');
            $comment->book_id = $id;
            $comment->save();
            return redirect(route('oneBook', $id));
        }
    }

    public function update($bookId, $comment_id)
    {
        $commentInfo = Comment::where('id', $comment_id)->get();
        return view('comments.update', compact('commentInfo', 'bookId'));
    }

    public function store(Request $request, $book_id, $comment_id)
    {
        $book = Book::where('id', $book_id)->get();
        $comment = Comment::find($comment_id);
        $comment->user_id = $request->input('user_id');
        $comment->comment = $request->input('comment');
        $comment->book_id = $book_id;
        $comment->save();
        return redirect(route('oneBook', $book_id));
    }

    public function delete($book_id, $comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();
        return redirect(route('oneBook', $book_id));
    }
}
