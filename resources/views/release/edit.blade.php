@extends('layout.index')

@section('content')
    <h2>Изменение статуса заявки</h2>
    <form action="{{ route('release.update' , $release->id ) }}" method="post">
        @csrf
        @method('patch')
    <div>
        <div>
            <h2>За {{$release->created_at}}</h2>
        </div>
        <div>
            <h2>Статус заявки</h2>
            <select name="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option value="Ожидает подтверждения">Ожидает подтверждения</option>
                <option value="Ожидает подтверждения">Подтверждено</option>
                <option value="Готово к выдаче">Готово к выдаче</option>
                <option value="Выданно">Выданно</option>
            </select>
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
            <a href="{{ route('release.show' , $release->id )}}" class="btn btn-danger">Отменить</a>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </div>
    </div>
    </form>
@endsection
