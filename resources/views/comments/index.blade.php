@extends ('layouts.layout')
@section('content')
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Article</th>
    <th scope="col">Title</th>
    <th scope="col">Comment</th>
    <th scope="col">Accept</th>
  </tr>
</thead>
<tbody>
    @for($i = 0; $i < $comments->count(); $i++)
    <tr>
        <th scope="row">{{$i+1}}</th>
        <td>{{$article[$i]->name}}</td>
        <td>{{$comments[$i]->title}}</td>
        <td>{{$comments[$i]->comment}}</td>
        <td>
            @if($comments[$i]->accept == 0)
            <div>
                <a class="btn btn-primary" href="/project2/example-app/public/comment/{{$comments[$i]->id}}/accept">Принять</a>
                <a class="btn btn-primary mt-1" href="/project2/example-app/public/comment/{{$comments[$i]->id}}/delete">Отклонить</a>
            </div>
            @else
            <div class="test=center">Активен</div>
            <a class="btn btn-primary mt-1" href="/project2/example-app/public/comment/{{$comments[$i]->id}}/delete">Удалить</a>
            @endif
        </td>
    </tr>
    @endfor
</tbody>
</table>
@endsection