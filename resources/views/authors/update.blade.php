@foreach($authorInfo as $author)
    <form method="POST" action="{{ route('saveAuthor', $author->id) }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" value="{{ $author->email }}"
                   placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fio">Ваше ФИО</label>
            <input class="form-control" id="fio" name="fio" type="text" value="{{ $author->fio }}" placeholder="ФИО">
            @error('fio')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="about">Об авторе</label>
            <input class="form-control" id="about" name="about" type="text" value="{{ $author->about }}"
                   placeholder="Об авторе">
            @error('about')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="links">Ссылки на соц.сети</label>
            <input class="form-control" id="links" name="links" type="text" value="{{ $author->links }}"
                   placeholder="Ссылки">
            @error('links')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

            <?php
            $user = auth()->user();
        if ($user->role_id == 1) { ?>
        <div class="form-group">
            <label for="role_id">Роль(1 - админ, 2 - автор)</label>
            <input class="form-control" id="role_id" name="role_id" type="text" value="{{ $author->role_id }}"
                   placeholder="Роль пользователя">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
            <?php } else { ?>
        <div class="form-group" style="display: none">
            <label for="role_id">Роль(1 - админ, 2 - автор)</label>
            <input class="form-control" id="role_id" name="role_id" type="text" value="{{ $author->role_id }}"
                   placeholder="Роль пользователя">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> <?php } ?>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input class="form-control" id="password" name="password" type="text" value="{{ $author->password }}"
                   placeholder="Пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary" type="submit" name="registration">Сохранить</button>
        </div>
    </form>
@endforeach
