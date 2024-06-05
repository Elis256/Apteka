@extends('layout.index')

@section('content')
    <h2>Списанные препараты</h2>
    <div>
        <div>
            <h2>За {{$write_off->created_at}}</h2>
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
                @foreach($write_off->drugs as $index => $drug)
                    <tr>
                        <th scope="row">{{$drug->id}}</th>
                        <td>{{$drug->title}}</a></td>
                        <td>{{$drug->description}}</td>
                        <td>{{$drug->cost}}</td>
                        <td>{{$drug_write_offs[$index]->quantity}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
