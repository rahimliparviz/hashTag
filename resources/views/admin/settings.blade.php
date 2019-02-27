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
        input[type=file]:before {
            color: white !important;
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
          <div class="col-md-12 mx-auto">
              <div class="card">

                  <div class="card-body">
                      <form method="POST" enctype="multipart/form-data" action="{{ route('settingsStore') }}">
                          {{ csrf_field() }}
                          <div class="row">
                              <div class="col-md-12 px-10">
                                  <div class="form-group">
                                      <label for="type">API script</label>
                                      <textarea width="100%" rows="15" name="script" type="text" class="form-control {{ $errors->has('script') ? ' is-invalid' : '' }}">{{ $settings->script }}

                                      </textarea>
                                      @if ($errors->has('script'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('script') }}</strong>
                                        </span>
                                      @endif
                                  </div>
                              </div>

                          </div>


                          <div class="row">
                              <div class="col-md-6 px-10">
                                  <div class="form-group">
                                      <label for="value">Image</label>
                                      <input style="background: #f96332" id="inputFile" name="image" type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}">
                                      @if ($errors->has('image'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="col-md-6 px-10">
                                  <div class="form-group">

                                      <img class="pull-right" id="image_upload_preview" src="{{ asset($settings->path) }}" alt="your image" />
                                  </div>
                              </div>
                          </div>




                          <div class="submit">
                              <input type="submit" value="submit">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

  </div>























<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>




<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputFile").change(function () {
        readURL(this);
    });
</script>

<script src="{{ asset('js/app.js') }}"></script>


</body>
</html>