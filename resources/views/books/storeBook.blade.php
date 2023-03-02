<?php
$user = auth()->user();
?>
<form method="POST" action="{{ route('saveAuthorBook', $user->id)}}">
    @csrf
    <div class="form-group">
        <label for="name">Название</label>
        <input class="form-control" id="name" name="name" type="text" value="" placeholder="Название">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="issue_date">Дата издания</label>
        <input class="form-control" id="issue_date" name="issue_date" type="text" value="" placeholder="Дата издания">
        @error('issue_date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="issue_agency">Агенство</label>
        <input class="form-control" id="issue_agency" name="issue_agency" type="text" value="" placeholder="Агенство">
        @error('issue_agency')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="cover">Обложка</label>
        <input class="form-control" id="cover" name="cover" type="text" value="" placeholder="Обложка">
        @error('cover')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-lg btn-primary" type="submit" name="registration">Сохранить</button>
    </div>
</form>
