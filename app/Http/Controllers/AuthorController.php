<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $allAuthors = User::whereNot('id', '=', [1, 4])->get();
        return view('authors.index', compact('allAuthors'));
    }

    public function show($id)
    {
        $authorInfo = User::find($id);
        return view('authors.show', compact('authorInfo'));
    }

    public function update($id)
    {
        $authorInfo = User::find($id);
        return view('authors.update', compact('authorInfo'));
    }

    public function saveAuthor(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->input('email');
        $user->fio = $request->input('fio');
        $user->about = $request->input('about');
        $user->links = $request->input('links');
        $user->role_id = $request->input('role_id');
        $user->password = $request->input('password');
        $user->save();
        return redirect(route('allAuthors'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('allAuthors'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->email = $request->input('email');
        $user->fio = $request->input('fio');
        $user->about = $request->input('about');
        $user->links = $request->input('links');
        $user->role_id = $request->input('role_id');
        $user->password = $request->input('password');
        $user->save();
        return redirect(route('allAuthors'));
    }
}
