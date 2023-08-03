@extends('layouts.main')
@section('content')
<ul>
    <div>
        <h3>
            Мои активные пасты
        </h3>
    @foreach($userPastes as $paste)
        <div style="margin: 20px 0 20px 0;">
            <span>{{ $paste->title}}</span>
            <a href="{{ route('pastes_show', ['url' => $paste->url])}}"> pastes/{{$paste->url}} </a>
        </div>
    @endforeach
        {{$userPastes->links('vendor.pagination.default')}}
    </div>
</ul>
@endsection
