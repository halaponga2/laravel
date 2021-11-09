@extends('layouts.layout')
@section('content')
<h1>Article</h1>
    <form method="post" >
        @csrf 
        <input placeholder="Введите имя" id="name" name="name" type="text" style="border: 1px solid black;">
        <input placeholder="Введите текст" id="short_text" name="short_text" type="text" style="border: 1px solid black;">
        <input id="data_create" name="data_create"  type="date"  style="border: 1px solid black;">
        <button type="submit">Отправить</button>
    </form>
@endsection