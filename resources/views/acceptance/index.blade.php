@extends('layout.index')

@section('content')
    <h2>Поступления</h2>
    <div class="p-2">
        <a href="{{route('acceptance.create')}}" class="btn btn-primary">Добавить поступление</a>
    </div>
    <div class="container overflow-scroll" style="max-height: 700px;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Принял</th>
                <th scope="col">Поставщик</th>
                <th scope="col">Дата поставки</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($acceptances as $index => $acceptance)
                <tr>
                    <td><a href="{{route('user.show' , $acceptance->user->id)}}" class="link-dark">{{$acceptance->user->mname}} {{$acceptance->user->fname}} {{$acceptance->user->lname}}</a></td>
                    <td>{{$acceptance->supplier}}</td>
                    <td>{{$acceptance->created_at}}</td>
                    <td><a href="{{route('acceptance.show' , $acceptance->id)}}" class="link-dark">...</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

