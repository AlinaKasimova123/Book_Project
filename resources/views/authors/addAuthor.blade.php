<form method="POST" action="{{ route('saveNewAuthor') }}">
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
        <label for="role_id">Роль пользователя</label>
        <input class="form-control" id="role_id" name="role_id" type="text" value="" placeholder="Id роли">
        @error('role_id')
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
