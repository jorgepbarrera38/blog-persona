<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!--<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('admin.partials.navbar')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-3">
                <img class="img-thumbnail" src="{{ asset('profile') }}/{{ auth()->user()->photo }}" alt="">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('categories.index') }}">Categorías</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('profile.index') }}">Perfil</a>
                    </li>
                    <li class="list-group-item">
                            <a href="{{ route('blog.index') }}" target="_blank">Sitio</a>
                        </li>
                    <li class="list-group-item">
                        <a href="javascript:document.getElementById('logout').submit()">Salir</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>