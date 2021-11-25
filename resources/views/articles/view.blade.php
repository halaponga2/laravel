@extends('layouts.layout')
@section('content')
    <div class="card mt-5 mb-5">
        <div class="card-body">
            <p>{{$article->short_text}}</p>
        </div>
        <div class="card-footer d-inline-flex justify-content-between">
            <p>{{$article->name}}<p>
            <i>{{$article->data_create}}</i>
        </div>  
    </div>      
    @if (!$comments->isEmpty())
        <h3>Комментарии</h3>    
    @endif
    
    @foreach($comments as $comment)
    <div class="d-inline-flex p-2">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                <h5 class="card-title">{{$comment->title}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$comment->comment}}</p>
            </div>
        </div>
    </div>
    @endforeach
    <div> {{$comments->links()}} </div>


    <form action="../articles/{{$article->id}}/comments" method="post" class="col-md-4 col-sm-12">
        @csrf 
        <h3>Добавить комментарий</h3>
        <div class="form-group">
            <label for="comment-title">Введите заголовок</label>
            <input type="text" name="title" id="comment-title" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="comment-text">Введите текст</label>
            <input type="text" name="comment" id="comment-text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Отправить</button>
    </form>
@endsection