@foreach($commentInfo as $comment)
<form method="POST" action="{{ route('saveComment', [$bookId, $comment->id]) }}">
            @csrf
            <div class="form-group" style="display: none">
                    <label for="name">Id пользователя</label>
                    <input class="form-control" id="user_id" name="user_id" type="text" value="{{ $comment->user_id }}" placeholder="Id пользователя">
                    @error('user_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="comment">Комментарий</label>
                    <input class="form-control" id="comment" name="comment" type="text" value="{{ $comment->comment }}" placeholder="Комментарий">
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="display: none">
                    <label for="book_id">Id книги</label>
                    <input class="form-control" id="book_id" name="book_id" type="text" value="{{ $comment->book_id }}" placeholder="Id книги">
                    @error('book_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-lg btn-primary" type="submit" name="registration">Сохранить</button>
                </div>
        </form>
        @endforeach
