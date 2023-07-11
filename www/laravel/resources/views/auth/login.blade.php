<form method="POST" action="/login">
    @csrf
    <input type="text" name="name" placeholder="логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Войти</button>
</form>
