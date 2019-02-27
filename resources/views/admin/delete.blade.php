<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  Hash Tag</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background-image:url("{{ asset('app/dark-grey-terrazzo/terrazzo.png') }}");
        }


    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    Hash Tag
                </a>

                <a class="navbar-brand" href="{{ route('allImages') }}">
                    Delete Images
                </a>

                <a class="navbar-brand" href="{{ route('settings') }}">
                    Settings
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="{{ route('log_out') }}"  >
                                Logout
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

</div>


<div class="container">
    <div class="row">
        @foreach($images as $img)
<div class="col-md-2">
    <img height="200" width="200" src="{{$img->path}}" alt="">

    <a class="btn btn-danger" href="{{route('imageDelete',['id'=>$img->id])}}">Delete</a>
</div>


        @endforeach
    </div>
</div>






<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


