<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
    @auth
        @can('author-rights')
                <?php
                $user = auth()->user();
                ?>
            <a href="{{ route('myBooks', $user->id) }}"
               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Мои
                книги</a>
            <a href="{{ route('addAuthorBook', $user->id) }}"
               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Добавить
                книгу</a>
        @endcan
    @else
        <a href="{{ route('login') }}"
           class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
            in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        @endif
    @endauth
    @foreach($authorInfo as $author)
        <p>
            ФИО автора:
            {{ $author->fio }}
        </p>
        <p>
            Об авторе:
            {{ $author->about }}
        </p>
        <p>
            Ссылки на соц.сети:
            {{ $author->links }}
        </p>
@endforeach
</body>
</html>
