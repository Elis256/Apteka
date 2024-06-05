@extends('layout.index')

@section('content')
    <h2>Списание</h2>
    <form action="{{route('write_off.store')}}" method="post">
        @csrf
        <div class="form-group">
            <h4>Препараты</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество на складе</th>
                    <th scope="col">К списанию</th>
                </tr>
                </thead>
                <tbody>
                @foreach($drugs as $drug)
                    <tr>
                        <th scope="row"><input type="checkbox" name="drugs[]" value="{{$drug->id}}" aria-label="Checkbox for following text input">  {{$drug->id}}</th>
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
        <div class="navbar">
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </form>
@endsection

