{{--<div class="flex-center position-ref full-height">--}}
{{--@if (Route::has('login'))--}}
{{--<div class="top-right links">--}}
{{--@auth--}}
{{--<a href="{{ url('/home') }}">Home</a>--}}
{{--@else--}}
{{--<a href="{{ route('login') }}">Login</a>--}}
{{--<a href="{{ route('register') }}">Register</a>--}}
{{--@endauth--}}
{{--</div>--}}
{{--@endif--}}



{{--<div  style="display: block" class="gallery">--}}
{{--@foreach($images as $img)--}}
{{--<img height="60" width="60" src="{{$img->path}}" alt="">--}}

{{--@endforeach--}}

{{--</div>--}}


{{--</div>--}}

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hash Tag</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('app/main.css')}}" />

        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />


    </head>
    <body>


    <div class="wrapper" style="background-image: url('{{$image}}');background-size: cover;">
        <div class="main-block">

        </div>

    </div>

    <input type="hidden" id="imgUrl" value="{{ action('WelcomeController@getImages') }}">

    </body>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="{{asset('app/main.js')}}"></script>


    <script>

        let oldImages=[];
        function getImages() {

            let imgUrl = $('#imgUrl').val();
            $.ajax({
                method: 'GET',
                url: imgUrl,
                success: function (response) {
                   // let container = $(".owl-wrapper");
                    let container = $(".main-block");

                    container.html('');
                    let newImages = [];



                    let newCount = response.length - oldImages.length;

                    if (newCount > 0){
                        for (let j=0; j< newCount; j++){
                                newImages.push(response[response.length - j - 1])
                        }
                    }



                    // console.log(newArr);

                    console.log(response.sort(function(a,b){
                        if(a.path > b.path){return -1}
                        if(a.path < b.path){return 1}
                        return 0;
                    }));







                    let start =0;
                    let end = 5;

                    if (response.length < 5) {
                        end = response.length;
                    }


                    if (response.length > 5) {
                        end=response.length;
                        start = response.length - 5;
                    }


                    for(let i = start; i< end; i ++){

                        let path = response[i].path;

                        // if (path.startsWith("new")){
                        //
                        //   let newPath =  path.slice(3);
                        //     console.log("corrected ---"+ newPath)
                        //     container.append(`<div class="item"><div style="background:url(${newPath});background-repeat: no-repeat;background-size: contain; background-position:center;"></div></div>`)
                        //
                        //
                        // }else{
                        //     container.append(`<div class="item"><div style="background:url(${response[i].path});background-repeat: no-repeat;background-size: contain; background-position:center;"></div></div>`)
                        //
                        // }


                            container.append(`<div class="item"><div style="background:url(${response[i].path});background-repeat: no-repeat;background-size: contain; background-position:center;"></div></div>`)



                      //  console.log(response[i].path)


                    }

                },
                error: function () {
                    console.log("Images error: ");
                }
            });
        }

        setInterval(function(){
            getImages() // this will run after every 5 seconds
        },5000);



    </script>

</html>
