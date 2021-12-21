@extends('layouts.layout')
@section('content')
<h1>Article</h1>
    <form method="post" action="/project2/example-app/public/articles/{{$article->id}}/edit" class="col-md-4 col-sm-12">
        @csrf
        <div class="form-group ">
            <label for="name">Введите имя</label>
            <input  id="name" name="name" type="text" class="form-control" value="{{$article->name}}">
        </div>
        <div class="form-group mt-3">
            <label for="short_text">Введите текст</label>
            <input  id="short_text" name="short_text" type="text" class="form-control" value="{{$article->short_text}}">
        </div>
        <div class="form-group mt-3">
            <label for="data_create">Выберите дату</label>
            <input id="data_create" name="data_create"  type="date"  class="form-control" value="{{$article->data_create}}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Отправить</button>
    </form>
@endsection