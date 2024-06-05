@extends('layout.index')

@section('content')
    <div class="mt-1 ">
        <div>
            <h1>{{$drug->title}}</h1>
        </div>
        <div class="mt-3">
            <h5>Описание</h5>
            {{$drug->description}}
        </div>
        <div class="mt-3">
            <h5>Количество на складе</h5>
            {{$drug->quantity}}
        </div>
        <div class="mt-3">
            <h5>Цена</h5>
            {{$drug->cost}}
        </div>
    </div>
    <div class="mt-1  ">
        <a href="{{ route('drug.edit' , $drug->id ) }}" class="btn btn-primary">Редактировать</a>
    </div>
    <div class="mt-1  ">
        <a href="{{ route('drug.index') }}" class="btn btn-primary"> Назад </a>
    </div>
    <form class="mt-1  " action="{{ route('drug.delete' , $drug->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection

