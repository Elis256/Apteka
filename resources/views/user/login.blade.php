@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-center p-5">
        <form style="width: 30%;" method="POST" action="{{ route('user.loginIn') }}">
            @csrf
            <div class="form-group">
                <label for="email">Ваша почта</label>
                <input name="email" type="email" class="form-control " id="email" aria-describedby="emailHelp" placeholder="Введите почту">
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
            <button name="sendMe" type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection

