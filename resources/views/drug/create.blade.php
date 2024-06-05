@extends('layout.index')

@section('content')
    Препараты
    <form action="{{route('drug.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Название препарата</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Описание препарата</label>
            <textarea name="description" class="form-control" id="description" placeholder="Введите описание"></textarea>
        </div>
        <div class="form-group">
            <label for="dosage" class="form-label">Дозировка</label>
            <input name="dosage" type="text" class="form-control" id="cost" placeholder="Введите дозировку">
        </div>
        <div class="form-group">
            <label for="cost" class="form-label">Цена</label>
            <input name="cost" type="text" class="form-control" id="cost" placeholder="Введите цену за 1 шт.">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection

