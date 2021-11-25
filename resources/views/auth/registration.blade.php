@extends('layouts.layout')
@section('content')

<h3>Регистрация</h3>

<form action="customRegistration" method="POST" class="col-md-4 col-sm-12">
    @csrf
    <div class="form-group ">
        <label for="name">Введите имя пользователя</label>
        <input  id="name" name="name" type="text" class="form-control">
    </div>
    <div class="form-group mt-3">
        <label for="email">Введите E-mail</label>
        <input  id="email" name="email" type="email" class="form-control">
    </div>
    <div class="form-group mt-3">
        <label for="password">Придумайте пароль (не менее 6 символов)</label>
        <input id="password" name="password"  type="password"  class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Зарегистрироваться</button>
    @if ($errors->has('email'))
        <span>{{$errors->first('email')}}</span>
    @endif
</form>

@endsection