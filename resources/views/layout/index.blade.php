<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Аптека</title>
    <link rel="shortcut icon" href="{{asset('img/apteka-ico.png')}}" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('drug.index')}}"><img src="{{asset('img/apteka-ico.png')}}" alt="ico" class="rounded-circle" width="50px"> Аптека</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('drug.index')}}">Остаток</a>
                    </li>
                    @if (auth()->user()->role != 2)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('acceptance.index')}}">Поступления</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('release.index')}}">Выдача</a>
                    </li>
                    @if (auth()->user()->role != 2)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('write_off.index')}}">Списание</a>
                    </li>
                    @endif
                    @if (auth()->user()->role != 2)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('procurement.index')}}">Закупка</a>
                    </li>
                    @endif
                </ul>
            @endif
        </div>
        <div class="collapse navbar-collapse d-flex flex-row-reverse">
            @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.logout' , Auth::id())}}">Выйти</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.show' , Auth::id())}}">Профиль</a>
                    </li>
                </ul>
                @if (auth()->user()->role == 0)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">Администрирование</a>
                    </li>
                </ul>
                @endif
            @endif
            @if (!Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active border rounded px-2" aria-current="page" href="{{route('user.login')}}">Войти</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active border rounded px-2" aria-current="page" href="{{route('user.registration')}}">Зарегистрироватся</a>--}}
{{--                    </li>--}}
                </ul>
            @endif
        </div>
    </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>
</body>
</html>
