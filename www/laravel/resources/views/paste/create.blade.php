<form method="POST" action="{{ route('pastes.store') }}">
    @csrf
    <div style="display: block">
        <label for="title">Название:</label>
        <input type="text" name="title" id="title">
    </div>

    <div style="display: block">
        <label for="text">Текст:</label>
        <textarea name="text" id="text"></textarea>
    </div>

    <div style="display: block">
        <label for="access">Доступ:</label>
        <select name="access" id="access">
            <option value="public">Доступна всем</option>
            <option value="unlisted">Доступна только по ссылке</option>
            <option value="private">Доступно только автору</option>
        </select>
    </div>

    <div style="display: block">
        <label for="language">Язык:</label>
        <input type="text" name="language" id="language">
    </div>

    <div style="display: block">
        <label for="expires">Срок жизни пасты:</label>
        <select name="expires" id="expires">
            <option value="none">без ограничения</option>
            <option value="addMinutes">10 минут</option>
            <option value="addHour">1 час</option>
            <option value="addHours">3 часа</option>
            <option value="addDay">1 день</option>
            <option value="addWeek">1 неделя</option>
            <option value="addMonth">1 месяц</option>
        </select>
    </div>

    <div style="display: block">
        <button type="submit">Создать пасту</button>

    </div>
</form>


<style>
    form div {
        padding: 20px;
    }
</style>
