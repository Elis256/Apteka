@extends('layout.index')

@section('content')
    <h2>Поступление</h2>
    <div>
        <div>
            <h2>От {{$acceptance->created_at}}</h2>
        </div>
        <div>
            <h2>Поставщик</h2>
            <h5>{{$acceptance->supplier}}</h5>
        </div>
        <div>
            <h2>Препараты</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                </tr>
                </thead>
                <tbody>
                @foreach($acceptance->drugs as $index => $drug)
                    <tr>
                        <td><a href="{{route('drug.show' , $drug->id)}}" class="link-dark">{{$drug->title}}</a></td>
                        <td>{{$drug->description}}</td>
                        <td>{{$drug->cost}}</td>
                        <td>{{$drugAcceptances[$index]->quantity}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
