@if (Auth::check())
    <p>Вы вошли в систему!</p>

@else
    <p>Вы не вошли в систему.</p>
    <a href="/login">Войти</a> | <a href="/register">Регистрация</a>
@endif
