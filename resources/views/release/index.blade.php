@extends('layout.index')

@section('content')
    <h2>Выдачи</h2>
    @if (auth()->user()->role != 1)
    <div>
        <a href="{{route('release.create')}}" class="btn btn-primary">Сформировать заявку</a>
    </div>
    @endif
    <div class="container overflow-scroll" style="max-height: 700px;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Затребовал</th>
                <th scope="col">Подразделение</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата формирования заявки</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($releases as $index => $release)
                <tr>
                    <td><a href="{{route('user.show' , $release->user->id)}}" class="link-dark">{{$release->user->mname}} {{$release->user->fname}} {{$release->user->lname}}</a></td>
                    <td>{{$release->user->unit}}</td>
                    <td>{{$release->status}}</td>
                    <td>{{$release->created_at}}</td>
                    <td><a href="{{route('release.show' , $release->id)}}" class="link-dark">...</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

