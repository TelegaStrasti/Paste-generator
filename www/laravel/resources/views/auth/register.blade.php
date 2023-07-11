<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="password" name="password_confirmation" placeholder="Подтверждение пароля" required>
    <button type="submit">Зарегистрироваться</button>
</form>
<div class="flex items-center justify-end mt-4">
    <a href="{{ url('auth/google') }}">
        АВТОРИЗАЦИЯ ЧЕРЕЗ ГУГЛ
    </a>
</div>
