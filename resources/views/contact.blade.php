@extends('layouts.layout')
@section('content')
<h1>Контакты</h1>
@foreach ($name as $element)
<p>{{$element}}</p>
@endforeach

@endsection