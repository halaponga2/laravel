<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link @linkactive('/')" href="/project2/example-app/public/">Главная</a>
                        <a class="nav-link @linkactive('articles') " href="/project2/example-app/public/articles">Статьи</a>
                        @can('moderator')
                        <a class="nav-link @linkactive('articles/create')"  href="/project2/example-app/public/articles/create">Создать</a>
                        @yield('comment')
                        <a class="nav-link @linkactive('comment')"  href="/project2/example-app/public/comment">Комментарии</a>
                        @endcan
                        <a class="nav-link @linkactive('about')" href="/project2/example-app/public/about">О нас</a>
                        <div class='d-flex justify-content-end'>
                        @if (Auth::guest())
                            <a class="nav-link @linkactive('registration')" href="/project2/example-app/public/registration">Регистрация</a>
                            <a class="nav-link" href="/project2/example-app/public/login">Вход</a>
                            @else
                            <a class="nav-link" href="/project2/example-app/public/logout">Выход</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>