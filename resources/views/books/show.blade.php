<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>--}}
    {{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
    {{--    <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>--}}
    <title>Document</title>
</head>
<body class="antialiased">
{{--<script type="text/javascript">--}}
{{--    tinymce.init({--}}
{{--        selector: 'textarea#comment',--}}
{{--        height: 100,--}}
{{--        width: 500--}}
{{--    });--}}
{{--    $(document).ready(function() {--}}
{{--        var formId = '#newComment';--}}
{{--        $(formId).on('submit', function(e) {--}}
{{--            e.preventDefault();--}}
{{--            var data = $(formId).serializeArray();--}}
{{--            data.push({name: 'body', value: tinyMCE.get('tinymce').getContent()});--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: $(formId).attr('data-action'),--}}
{{--                data: data,--}}
{{--                success: function (response, textStatus, xhr) {--}}
{{--                    window.location=response.redirectTo;--}}
{{--                },--}}
{{--                complete: function (xhr) {--}}

{{--                },--}}
{{--                error: function (XMLHttpRequest, textStatus, errorThrown) {--}}
{{--                    var response = XMLHttpRequest;--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}

{{--    function content() {--}}
{{--        alert(tinyMCE.get('comment').getContent());--}}
{{--    }--}}
{{--</script>--}}
<?php
$user = auth()->user();
?>
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        @auth
            @can('author-rights')
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
    </div>
    <h3>Название книги:</h3>
    @foreach($bookInfo as $book)
        <p>{{ $book->name }}</p>
    @endforeach

    <h3>Автор книги:</h3>
    @foreach($authors as $author)
        <p>{{ $author->fio }}</p>
    @endforeach

        <?php
        foreach ($bookInfo as $book) {
            $bookId = $book->id;
        }
        ?>
    <h2>Оставьте комментарий:</h2>
    <form id="newComment" method="POST" action="{{ route('addComment', $bookId) }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Ваше ФИО</label>
            <input class="form-control" type="text" value="" placeholder="ФИО">
            @error('fio')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" type="text" placeholder="Комментарий"></textarea>
            @error('fio')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="registration">Отправить</button>
        </div>
    </form>

    <h2>Комментарии:</h2>
    @foreach($comments as $comment)
        <p>{{ $comment->comment }}</p>
        <div>
            @can('admin-rights')
                <a href="{{ route('updateComment', [$bookId, $comment->id]) }}">Редактировать</a>
                <a href="{{ route('deleteComment', [$bookId, $comment->id]) }}">Удалить</a>
            @endcan
        </div>
    @endforeach
</div>
</body>
</html>
