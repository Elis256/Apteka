@extends('layout.index')

@section('content')
    <h2>Заявки на закупку</h2>
    <div class="p-2">
                <a href="{{route('procurement.create')}}" class="btn btn-primary">Сформировать заявку</a>
    </div>
    <div class="container overflow-scroll" style="max-height: 700px;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Создал</th>
                <th scope="col">Дата создания</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($procurements as $index => $procurement)
                <tr>
                    <td><a href="{{route('user.show' , $procurement->user->id)}}" class="link-dark">{{$procurement->user->mname}} {{$procurement->user->fname}} {{$procurement->user->lname}}</a></td>
                    <td>{{$procurement->created_at}}</td>
                    <td><a href="{{route('procurement.show' , $procurement->id)}}" class="link-dark">...</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

