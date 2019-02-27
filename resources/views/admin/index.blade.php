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
    <style> body {  background-image:url("{{ asset('app/dark-grey-terrazzo/terrazzo.png') }}"); } </style>
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


{{--route for ajax--}}
<input type="hidden" id="url" value="{{ action('ImagesController@index') }}">

    {{--script here--}}
    {!! \App\Settings::first()->script !!}
    {{--script here--}}


<script  src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script><script>








    $( document ).ready(function() {
        var url = $('#url').val()





        $('body').on('click', 'div', function(event) {
            console.log(200)

            event.stopPropagation();

            let elem = $(this).siblings('.sk-ig-post-img');
            let path = elem.css("background-image").replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, '');

            console.log(elem.css("background-image").replace(/.*\s?url\([\'\"]?/, '').replace(/[\'\"]?\).*/, ''))
            //window.location.href = url;


            $.ajax({
                method: 'GET',
                url: url,
                data: {'path': path},
                success: function (response) {
                    console.log(response);

                },
                error: function () {
                    console.log("AJAX error: ");
                }
            });

        });

    })
</script>



</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


