@extends('layouts.layout')
@section('content')
    <h1>Главная</h1>
    <div>
        <p>{{session('msg')}}</p>
    </div>
    @foreach ($letters as $article)
        <div>
            <p>{{ $article->name}} - {{ $article->short_text}} - {{ $article->data_create}} </p>
        </div>
    @endforeach

@endsection