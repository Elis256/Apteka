@extends('layout.index')

@section('content')
    <h2>Формирование выдачи</h2>
    <form action="{{route('release.store')}}" method="post">
        @csrf
        <div class="form-group">
            <h4>Препараты</h4>
            <div class="container overflow-scroll" style="max-height: 700px;">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Затребованно</th>
                </tr>
                </thead>
                <tbody>
                @foreach($drugs as $drug)
                    <tr>
                        <th scope="row"><input type="checkbox" name="drugs[]" value="{{$drug->id}}" aria-label="Checkbox for following text input"></th>
                        <td><a href="{{route('drug.show' , $drug->id)}}" class="link-dark">{{$drug->title}}</a></td>
                        <td>{{$drug->description}}</td>
                        <td>{{$drug->cost}}</td>
                        <td>{{$drug->quantity}}</td>
                        <td><input name="quantity[]" type="text" class="form-control" placeholder="Количество"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="navbar">
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection

