@extends('layout.index')

@section('content')
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="form-group">
            <label for="fname">Имя</label>
            <input name="fname" type="text" class="form-control" id="fname" placeholder="Введите Имя">
            @error('fname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mname">Фамилия</label>
            <input name="mname" type="text" class="form-control" id="mname" placeholder="Введите Фамилию">
            @error('mname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lname">Отчество</label>
            <input name="lname" type="text" class="form-control" id="lname" placeholder="Введите Отчество">
            @error('lname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Должность</label>
            <select class="form-select" name="role" aria-label="Default select example">
                <option value="0">Администратор</option>
                <option value="1">Заведующий аптечным пунктом</option>
                <option value="2">Заведующий отделением</option>
            </select>
            @error('role')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="unit">Подразделение</label>
            <input name="unit" type="text" class="form-control" id="unit" placeholder="Введите Подразделение">
            @error('unit')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Ваша почта</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите почту">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Ваш пароль</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button name="sendMe" type="submit" class="btn btn-primary">Зарегистрировать</button>
    </form>
@endsection

