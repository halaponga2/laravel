@extends('layouts.layout')
@section('content')
    <h2>{{$article->name}}</h2>
    <i>{{$article->data_create}}</i>
    <p>{{$article->short_text}}</p>        
    <h3>Комментарии</h3>
    @foreach($article->comments as $comment)
        <b>{{$comment->title}}</b>
        <p>{{$comment->comment}}</p>
    @endforeach



    <form action="../articles/{{$article->id}}/comments" method="post">
        @csrf 
        <h3>Добавить комментарий</h3>
        <div>
            <input type="text" name="title" id="comment-title" placeholder="Введите заголовок">
            <input type="text" name="comment" id="comment-text" placeholder="Введите текст">
        </div>
        <div>
            <button type="submit">Отправить</button>
        </div>
    </form>
@endsection