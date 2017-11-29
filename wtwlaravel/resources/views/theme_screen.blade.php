<!doctype html>
<html lang="en">
<head>
    <title>Walk the Ward</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style-theme.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <div class="text-right">
                    <img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark">
                    <!--<i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>-->
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 id="themehead"align="center">Välj ett tema</h1>
            </div>
        </div>
        <div class="row justify-content-start">
            @php
                $count = 1
            @endphp
            @foreach ($theme as $t)
            <div class="col-md-6 col-theme">
                <button class="button-theme theme-color-{{$count++}}" data-theme-id="{{ $t->id }}">
                    <h2 class="align-center">
                        <div id="themehead_bold">
                       <img src="./images/circle2.png" alt="icon" width="70px" height="auto">
                        {{ $t->name }}
                          </div>
                      </h2>
                 </button>
            </div>
            @php
                if ($count == 7) {
                    $count = 1;
                }
            @endphp
            @endforeach
            {{-- <div class="col-md-6">
                <h2 align="center"><img src="./images/circle.png" alt="icon" width="70px" height="auto"> Trädgård</h2>
            </div> --}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- @foreach ($theme as $t)
                    <button class="button button-theme" data-theme-id="{{ $t->id }}">
                        {{ $t->name }}
                    </button>
                @endforeach
                theme --}}
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
    <input id="gameId" type="hidden" name="gameId" value="{{$gameId}}">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.button-theme').click(function(){
                var themeId = $(this).attr("data-theme-id");
                console.log(themeId);
                var gameId = $('#gameId').val();
                console.log(gameId);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/')}}/theme/store",
                    data: {themeId: themeId, gameId: gameId},
                    dataType: 'json',
                    success: function(data) { // Om det LYCKADES att spara data
                        console.log(data);
                        window.location.href = "{{url('/')}}/scan";

                    }, // SLUT - Om det LYCKADES att spara data
                    error: function(xhr, textStatus, errorThrown,) { // Om det MISSLYCKADES att spara data
                        console.log(xhr);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                }); // SLUT - Om det MISSLYCKADES att spara data
            });
        });
    </script>
</body>
</html>
