@extends('layout.adminLayout')

@section('content')
    <h2>Пользователи</h2>
    <div class="p-2">
        <a href="{{route('admin.createUser')}}" class="btn btn-primary">Создать пользователя</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Email</th>
            <th scope="col">Должность</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
            <tr>
                <td>{{$user->mname}}</td>
                <td>{{$user->fname}}</td>
                <td>{{$user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

