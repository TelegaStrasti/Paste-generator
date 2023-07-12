@extends('layouts.main')
@section('content')

    <h1>Название пасты: {{ $paste->title }}</h1>
    <p>
        Текст пасты: <br> {{ $paste->text }}
    </p>
    @if (Auth::check() and Auth::id() != $paste->user_id)
        <form id="complaint-form" style="margin-top: 20px; " action="{{ route('complaints_make') }}" method="POST">
            @csrf
            <input type="hidden" name="paste_id" value="{{ $paste->id }}">
            <textarea name="text" placeholder="Введите причину жалобы"></textarea>
            <button type="submit">Отправить жалобу</button>
        </form>
    @endif

@endsection
