@extends('layouts.layout')
@section('content')

<h3>Авторизация</h3>

<form action="customLogin" method="POST" class="col-md-4 col-sm-12">
    @csrf
    <div class="form-group mt-3">
        <label for="email">Введите E-mail</label>
        <input  id="email" name="email" type="email" class="form-control">
    </div>
    <div class="form-group mt-3">
        <label for="password">Введите пароль</label>
        <input id="password" name="password"  type="password"  class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Войти</button>
</form>

@endsection