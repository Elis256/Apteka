@extends('layout.index')

@section('content')
    <h2>Заявка на выдачу лекарственных средств</h2>
    <div>
        <div>
            <h2>За {{$release->created_at}}</h2>
        </div>
        <div>
            <h2>Статус заявки</h2>
            <h5>{{$release->status}}</h5>
        </div>
        <div>
            <h2>Препараты</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                </tr>
                </thead>
                <tbody>
                @foreach($release->drugs as $index => $drug)
                    <tr>
                        <th scope="row">{{$drug->id}}</th>
                        <td>{{$drug->title}}</a></td>
                        <td>{{$drug->description}}</td>
                        <td>{{$drug->cost}}</td>
                        <td>{{$drugReleases[$index]->quantity}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <a href="{{ route('release.edit' , $release->id ) }}" class="btn btn-primary">Изменить статус заявки</a>
            </div>
        </div>
    </div>
@endsection
