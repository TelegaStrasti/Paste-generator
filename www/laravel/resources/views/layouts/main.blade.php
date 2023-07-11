<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav>

    @if (Auth::check())
        <ul class="nav-list">
            <li>
                Имя: {{ auth()->user()->name }}
            </li>

            <li>
                <a href="{{route('pastes_create')}}"> Добавить пасту</a>
            </li>

            <li>
                <a href="{{ route('user_index') }}"> Личный кабинет </a>
            </li>
        </ul>
    @else
        <ul class="nav-list">
            <li>
                Вы не вошли в систему.
            </li>
            <li>
                <a href="{{route('pastes_create')}}"> Добавить пасту</a>
            </li>
            <li>
                <div>
                    <a href="/login">Войти</a> | <a href="/register">Регистрация</a>
                </div>
            </li>
        </ul>
        <p></p>
    @endif

</nav>
<main>
    @yield('content')

    <div style="margin: 100px 0 0 0 ; display: flex;">
        <div>
            <h2>Последние 10 публичных паст</h2>
            <ul>
                @foreach($latestPastes as $paste)
                    <li>
                        <a href="{{ route('pastes_show', ['url' => $paste->url])}}"> my-awesome-pastebin.tld/{{$paste->url}} </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            @if(Auth::check())
                <h2>Мои пасты</h2>
                <ul>
                    @foreach($userPastes as $paste)
                        <li>
                            <a href="{{ route('pastes_show', ['url' => $paste->url])}}"> my-awesome-pastebin.tld/{{$paste->url}} </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</main>
</body>
</html>

<style>
    body * {
        margin: 0 auto;
    }

    nav {
        padding: 10px 0 10px 0;
        border: solid black 1px;
    }

    .nav-list {
        display: flex;
        justify-content: space-between;
    }

    ul {
        list-style: none;

    }
</style>
