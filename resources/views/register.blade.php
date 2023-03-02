<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
</head>
<body>
<h1>Регистрация</h1>
<form method="POST" action="{{ route('register_post') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="fio">Ваше ФИО</label>
        <input class="form-control" id="fio" name="fio" type="text" value="" placeholder="ФИО">
        @error('fio')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="about">Об авторе</label>
        <input class="form-control" id="about" name="about" type="text" value="" placeholder="Об авторе">
        @error('about')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="links">Ссылки на соц.сети</label>
        <input class="form-control" id="links" name="links" type="text" value="" placeholder="Ссылки">
        @error('links')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input class="form-control" id="password" name="password" type="text" value="" placeholder="Пароль">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-lg btn-primary" type="submit" name="registration">Зарегистрироваться</button>
    </div>
</form>
</body>
</html>
