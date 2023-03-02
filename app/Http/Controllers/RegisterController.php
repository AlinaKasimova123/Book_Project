<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('allData'));
        }

        $validatefields = $request->validate([
            'email' => 'required|email',
            'fio' => 'required',
            'about' => 'required',
            'links' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($validatefields);

        if ($user) {
            Auth::login($user);
            return redirect(route('allData'))->withErrors([
                'formError' => 'Произошла ошибка при сохранении пользователя'
            ]);
        }
    }
}
