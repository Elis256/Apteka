@extends('layout.index')

@section('content')
    <h2>Остатки на складе</h2>
    <div class="container overflow-scroll" style="max-height: 700px;">
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
            @foreach($drugs as $index => $drug)
                <tr>
                    <td><a href="{{route('drug.show' , $drug->id)}}" class="link-dark">{{$drug->title}}</a></td>
                    <td>{{$drug->description}}</td>
                    <td>{{$drug->cost}}</td>
                    <td>{{$drug->quantity}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

