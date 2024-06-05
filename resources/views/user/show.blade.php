@extends('layout.index')

@section('content')
    <h2>Профиль</h2>
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex justify-content-center">
                <img src="{{asset('img/profileAvatar.jpg')}}" alt="Avatar" class="rounded-circle" width="200">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ФИО</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">{{$user->mname}} {{$user->fname}} {{$user->lname}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">{{$user->email}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Подразделение</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">{{$user->unit}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Должность</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if($user->role == 0)
                                Администратор
                            @endif
                                @if($user->role == 1)
                                    Заведующий аптечным пунктом
                                @endif
                                @if($user->role == 2)
                                    Заведующий отделением
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

