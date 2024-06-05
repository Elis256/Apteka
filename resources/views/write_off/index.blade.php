@extends('layout.index')

@section('content')
    <h2>Списания</h2>
    <div>
        <a href="{{route('write_off.create')}}" class="btn btn-primary">Списать препараты</a>
    </div>
    <div class="container overflow-scroll" style="max-height: 700px;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Списал</th>
                <th scope="col">Дата формирования заявки</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($write_offs as $index => $write_off)
                <tr>
                    <td><a href="{{route('user.show' , $write_off->user->id)}}" class="link-dark">{{$write_off->user->mname}} {{$write_off->user->fname}} {{$write_off->user->lname}}</a></td>
                    <td>{{$write_off->created_at}}</td>
                    <td><a href="{{route('write_off.show' , $write_off->id)}}" class="link-dark"> ...</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

