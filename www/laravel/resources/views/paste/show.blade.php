@extends('layouts.main')
@section('content')

<h1>Название пасты: {{ $paste->title }}</h1>
<p>
    Текст пасты: <br> {{ $paste->text }}
</p>
@endsection
