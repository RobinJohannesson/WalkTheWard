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
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
         <div id="spacerow">
        <div class="row justify-content-end">

            <div class="col-md-8">
                <button type="button" id="exit_button">Avsluta</button>
            </div>
            <div class="col col-md-3">
                <div class="text-right">
                <i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>
                </div>
            </div>



        </div>

        </div>
        <div class="row justify-content-start">
                <div class="col-md-6">
                    <img src="{{url('/')}}/images/map/map-white-stroke.png" alt="Karta kommer snart!" usemap="#Map" />


                    <map name="Map" id="Map">


                        <area alt="" title="" shape="poly" class="1" coords="169,356,159,368,135,368,134,360,127,346,120,345,110,348,103,334,101,316,89,300,88,277,73,264,70,243,55,220,38,196,33,175,29,165,26,142,18,125,7,111,21,111,33,121,47,126,55,134,62,138,69,152,93,157,107,149,116,131,116,125,94,105,96,97,91,88,89,74,81,71,75,65,58,55,59,43,81,21,96,24,106,34,120,43,129,42,139,35,152,40,152,55,151,68,157,83,177,87,192,90,211,90,223,103,242,95,254,79,270,66,285,59,297,59,304,52,314,61,334,63,333,73,312,84,308,104,307,123,293,124,282,136,287,161,293,172,287,183,292,193,291,214,284,219,295,237,300,238,292,251,290,260,266,264,254,282,242,308,240,329,227,329,215,335,200,337,187,350,190,364" />

                        <area alt="Helsingborg" title="Helsingborg" coords="67,236,10" shape="circle" class="1">
                        <area alt="Ängelholm" title="Ängelholm" coords="113,141,10" shape="circle" class="1">
                        <area alt="Båstad" title="Båstad" coords="119,43,10" shape="circle" class="1">
                        <area alt="Örkelljunga" title="Örkelljunga" coords="231,120,10" shape="circle" class="1">
                        <area alt="Perstorp" title="Perstorp" coords="253,203,10" shape="circle" class="1">
                        <area alt="Klippan" title="Klippan" coords="171,209,10" shape="circle" class="1">
                        <area alt="Svalöv" title="Svalöv" coords="175,304,10" shape="circle" class="1">
                        <area alt="Landskrona" title="Landskrona" coords="109,342,10" shape="circle" class="1">

                        <area alt="" title="" shape="poly" class="2" coords="516,395,512,414,482,407,479,406,463,417,450,407,454,392,451,379,432,364,442,350,440,328,430,313,423,311,405,327,399,317,391,302,382,294,368,290,357,289,369,274,364,262,363,250,357,246,340,237,337,223,329,218,316,220,312,231,295,222,303,195,296,183,305,173,292,139,302,130,313,127,318,108,318,91,339,79,343,64,367,61,382,55,395,47,408,49,420,54,433,52,454,37,467,37,479,36,484,20,491,6,501,7,504,16,529,23,539,25,549,20,573,32,613,42,613,50,607,57,606,64,592,67,585,80,586,100,580,119,582,134,589,149,590,164,598,170,604,165,616,173,631,172,633,211,631,235,613,268,600,267,595,283,583,288,570,306,560,309,556,320,541,343,528,359" />

                        <area alt="Kristianstad" title="Kristianstad" coords="525,263,10" shape="circle" class="2">
                        <area alt="Åhus" title="Åhus" coords="551,327,10" shape="circle"class="2">
                        <area alt="Degeberga" title="Degeberga" coords="496,367,10" shape="circle"class="2">
                        <area alt="Tollarp" title="Tollarp" coords="464,317,10" shape="circle"class="2">
                        <area alt="Sösdala" title="Sösdala" coords="403,224,10" shape="circle"class="2">
                        <area alt="Hässleholm" title="Hässleholm" coords="432,176,10" shape="circle"class="2">
                        <area alt="Broby" title="Broby" coords="520,137,10" shape="circle"class="2">
                        <area alt="Bromölla" title="Bromölla" coords="615,234,10" shape="circle"class="2">

                        <area alt="" title="" shape="poly" class="3" coords="312,442,279,420,261,413,246,413,243,401,220,390,222,369,215,361,200,358,209,346,227,341,240,338,250,330,248,311,263,285,271,272,295,266,301,256,308,242,318,238,322,228,330,229,332,240,340,251,356,255,351,264,358,275,345,283,348,300,367,297,383,304,387,318,394,324,395,332,403,336,425,321,431,328,427,335,432,341,435,350,423,361,426,369,434,375,435,381,445,384,446,396,439,405,427,418,411,410,387,404,377,413,374,422,362,419,354,427,333,419" />

                        <area alt="Eslöv" title="Eslöv" coords="253,336,10" shape="circle" class="3">
                        <area alt="Stehag" title="Stehag" coords="275,314,10" shape="circle" class="3">
                        <area alt="Höör" title="Höör" coords="311,295,10" shape="circle" class="3">
                        <area alt="Fulltofta" title="Fulltofta" coords="333,320,10" shape="circle" class="3">
                        <area alt="Hörby" title="Hörby" coords="355,337,10" shape="circle" class="3">
                        <area alt="Långaröd" title="Långaröd" coords="403,382,10" shape="circle" class="3">
                        <area alt="Östraby" title="Östraby" coords="336,399,10" shape="circle" class="3">
                        <area alt="Hurva" title="Hurva" coords="287,364,10" shape="circle" class="3">

                        <area alt="" title="" shape="poly" class="4" coords="514,421,516,443,522,453,533,460,535,487,547,501,556,513,555,521,562,531,552,554,526,586,519,597,505,619,472,613,441,588,421,584,414,584,400,594,376,587,355,587,343,592,338,578,348,560,346,540,346,535,317,523,308,508,315,484,333,471,335,459,322,446,334,431,353,434,362,428,377,430,388,413,413,419,427,427,442,411,450,424,478,417,492,422" />

                        <area alt="Malmö" title="Malmö" coords="159,484,10" shape="circle" class="4">
                        <area alt="Lund" title="Lund" coords="197,444,10" shape="circle" class="4">
                        <area alt="Revingehed" title="Revingehed" coords="280,443,10" shape="circle" class="4">
                        <area alt="Svedala" title="Svedala" coords="209,531,10" shape="circle" class="4">
                        <area alt="Skurup" title="Skurup" coords="283,542,10" shape="circle" class="4">
                        <area alt="Smygehamn" title="Smygehamn" coords="257,621,10" shape="circle" class="4">
                        <area alt="Trelleborg" title="Trelleborg" coords="192,607,10" shape="circle" class="4">
                        <area alt="Höllviken" title="Höllviken" coords="135,589,10" shape="circle" class="4">

                        <area alt="" title="" shape="poly" class="5" coords="334,595,323,604,297,606,285,612,258,630,235,630,187,607,172,612,153,602,139,593,112,597,95,596,102,580,109,591,131,588,135,572,143,570,140,556,132,544,122,525,121,500,151,479,157,470,169,471,175,459,169,434,155,418,145,418,146,406,128,410,132,398,141,391,138,376,154,373,161,376,172,364,189,370,199,370,211,369,211,391,225,406,235,408,237,421,268,422,303,446,316,450,326,464,317,475,304,486,300,503,301,514,311,528,337,539,340,553,331,575" />

                        <area alt="Ystad" title="Ystad" coords="396,584,10" shape="circle" class="5">
                        <area alt="Sjöbo" title="Sjöbo" coords="360,477,10" shape="circle" class="5">
                        <area alt="Ravlunda" title="Ravlunda" coords="497,434,10" shape="circle" class="5">
                        <area alt="Kivik" title="Kivik" coords="520,464,10" shape="circle" class="5">
                        <area alt="Simrishamn" title="Simrishamn" coords="554,530,10" shape="circle" class="5">
                        <area alt="Hammenhög" title="Hammenhög" coords="496,558,10" shape="circle" class="5">
                        <area alt="Kåseberga" title="Kåseberga" coords="472,608,10" shape="circle" class="5">
                        <area alt="Tomelilla" title="Tomelilla" coords="441,523,10" shape="circle" class="5">



                    </map>

                </div>
                 <div class="col-md-6">
                     <h1 class="text-center">Syd Östra Skåne</h1>
                     <p>Antal poäng: <span id="totalStars">{{$totalStars}}</span>/<span id="maxStars">{{$maxStars}}</span></p>
                     <p>Antal steg: {{$distanceAmount}}</p>
                     <button type="button" class="button exercise_button">Dagens rörelse</button>
                </div>
        </div>
        <div class="row justify-content-between">
            <div class="col col-md-4">
             </div>
            <div class="col col-md-4">
               </div>
            <div class="col col-md-4">
                <button type="button" id="homeplaybutton">Spela --></button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{-- <div class="modal-dialog modal-lg" role="document"> --}}
            <div class="modal-dialog modal-custom-width" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resultsModalLabel">Dagens rörelse</h5>
                </div>
                <div class="modal-body">
                    <video id="movement-video" loop="loop">
                        <source src="{{url('/')}}/videos/question_videos/t1q4.mp4" type="video/mp4"></source>
                    Your browser does not support the video tag.
                    </video>
                </div>
                <div class="modal-footer justify-content-center">
                    <p>
                        Utförde du dagens rörelse?
                    </p>
                    <input class="todayMovementButton" type="submit" value="Ja">
                    <input class="todayMovementButton" type="submit" value="Nej">
                    <input class="todayMovementButton" type="submit" value="Vill inte">
                </div>
            </div>
        </div>
    </div>

    <input id="gameId" type="hidden" name="gameId" value="{{$gameId}}">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{url('/')}}/js/jquery.rwdImageMaps.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#movement-video').click(function(event) {
                if (event.target.paused) {
                    event.target.play();
                }
                else {
                    event.target.pause();
                }
            });
            $('img[usemap]').rwdImageMaps();
            $('area').click(function(){
                var areaId = $(this).attr("class");
                console.log(areaId);
                var gameId = $('#gameId').val();
                console.log(gameId);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/')}}/home",
                    data: {areaId: areaId, gameId: gameId},
                    dataType: 'json',
                    success: function(data) { // Om det LYCKADES att spara data
                        console.log(data);

                         $('#totalStars').html(data['totalStars']);
                         $('#maxStars').html(data['maxStars']);
                    }, // SLUT - Om det LYCKADES att spara data
                    error: function(xhr, textStatus, errorThrown,) { // Om det MISSLYCKADES att spara data
                        console.log(xhr);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                }); // SLUT - Om det MISSLYCKADES att spara data
            });

            $('#homeplaybutton').click(function(){
                window.location.href = "{{url('/')}}/scan";
            });

            $('#exit_button').click(function(){
                window.location.href = "{{url('/')}}/statistics";
            });

            $('.exercise_button').click(function(){
                var video = $("#movement-video");
                $("#movement-video").height("100%");
                $("#movement-video").width("100%");
                $('#movementModal').modal({
                    backdrop: "static"
                });
                video[0].play();
            });
            $('.todayMovementButton').click(function() {
                var video = $("#movement-video");
                video[0].pause();
                $('#movementModal').modal('hide');
            });
        });
    </script>
</body>
</html>
