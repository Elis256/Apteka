@extends('layout.index')

@section('content')
    Препараты
    <form action="{{ route('drug.update' , $drug->id ) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Название препарата</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Введите название" value="{{$drug->title}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание препарата</label>
            <textarea name="description" class="form-control" id="description" placeholder="Введите описание">{{$drug->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Цена</label>
            <input name="cost" type="text" class="form-control" id="cost" placeholder="Введите цену за 1 шт." value="{{$drug->cost}}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Количество препаратов" value="{{$drug->quantity}}">
        </div>
        <a href="{{ route('drug.show' , $drug->id )}}" class="btn btn-danger">Отменить</a>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
