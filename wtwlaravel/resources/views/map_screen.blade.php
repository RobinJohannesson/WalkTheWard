<!doctype html>
<html lang="en">
<head>
    <title>Walk the Ward</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <div class="text-center">
                    <i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md">
                <h1 class="text-center">Välj en del av Skåne</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-9">
                {{-- <img src="{{url('/')}}/images/map/NW-1.png" alt="Kartdel NV" class="" />
                <img src="{{url('/')}}/images/map/NE-1.png" alt="Kartdel NÖ" class="" />
                <img src="{{url('/')}}/images/map/CENTER-1.png" alt="Kartdel center" class="" />
                <img src="{{url('/')}}/images/map/SW-1.png" alt="Kartdel SV" class="" />
                <img src="{{url('/')}}/images/map/SE-1.png" alt="Kartdel SÖ" class="" /> --}}
                <img src="{{url('/')}}/images/map/NE-1.png" alt="TEST" usemap="#Map" />
                <a href="#">
                    <map name="Map" id="Map">
                        <area alt="" title="" href="#" shape="poly" coords="230,419,194,409,170,420,161,392,156,372,151,347,146,319,122,320,104,314,91,294,80,284,73,260,68,243,50,224,33,215,27,214,17,191,13,165,14,143,26,126,32,107,40,91,60,77,89,65,112,53,144,52,161,45,184,40,202,32,210,15,227,21,243,26,267,27,283,35,312,45,320,54,294,62,291,87,293,114,293,137,302,167,313,182,324,176,341,182,346,205,344,229,329,246,317,255,297,281,282,300,262,312,254,339,241,356,228,385,226,407" />
                    </map>
                </a>

            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col col-md-4">
                <button type="button" class="button continue_button">Fortsätt</button>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{url('/')}}/js/jquery.rwdImageMaps.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(e) {
        $('img[usemap]').rwdImageMaps();
    });
    </script>
</body>
</html>
