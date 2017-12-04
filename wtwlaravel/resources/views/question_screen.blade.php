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
    <link rel="stylesheet" href="{{url('/')}}/css/font-awesome.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 order-2 order-md-1">
                <p class="">Tema: {{ $currentTheme->name }}</p>
                <p class="questionparagraph">{{ $question->question }}</p>
            </div>
            <div class="col col-md-2 order-1 order-md-2">
                <div class=" text-right">
                  <a href="#" data-toggle="popover" data-trigger="focus" title="Svara på frågan!" data-content="Du får fyra svarsalternativ till varje fråga. Svarar du inte rätt den första gången får du försöka tills du väljer rätt alternativ av svaren. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-2">
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resultsModal" data-backdrop="static">
                Testa modal
            </button> --}}
        </div>
        <div class="col-md-8">
            <p id="answer-message" class="text-center"></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            @if ($question->imageSource)
                <img src="{{url('/')}}/images/question_images/{{$question->imageSource}}"
                alt="Bild för frågan." id="question-img">
            @elseif ($question->videoSource)
                <i class="fa fa-play-circle fa-6 play-button-video-question" aria-hidden="true"></i>
                <video id="question-video" autoplay loop="loop">
                    <source src="{{url('/')}}/videos/question_videos/{{$question->videoSource}}" type="video/mp4"></source>
                    Your browser does not support the video tag.
                </video>
            @else
                <p>
                    Ingen bild eller video finns.
                </p>
            @endif
        </div>
        <div class="col-md-6">
            <button id="answer-1" class="button button-answer {{$question->correctAnswer == 1 ? "correct-answer" : ""}}">
                {{ $question->answer1 }}
            </button>
            <button id="answer-2" class="button button-answer {{$question->correctAnswer == 2 ? "correct-answer" : ""}}">
                {{ $question->answer2 }}
            </button>
            <button id="answer-3" class="button button-answer {{$question->correctAnswer == 3 ? "correct-answer" : ""}}">
                {{ $question->answer3 }}
            </button>
            <button id="answer-4" class=" button button-answer {{$question->correctAnswer == 4 ? "correct-answer" : ""}}">
                {{ $question->answer4 }}
            </button>

            <input id="gameId" type="hidden" name="gameId" value="{{$gameId}}">
            <input id="placeId" type="hidden" name="placeId" value="{{$placeId}}">
            <input id="questionId" type="hidden" name="questionId" value="{{$question->id}}">

            <audio id="audio-right">
                <source src="{{url('/')}}/audio/264981_renatalmar_sfx-magic.ogg" type="audio/ogg"></source>
            </audio>
            <audio id="audio-wrong">
                <source src="{{url('/')}}/audio/362650_ethraiel_soft-alert.ogg" type="audio/ogg"></source>
            </audio>
            <audio id="audio-star1">
                <source src="{{url('/')}}/audio/162467_311243-lq.ogg" type="audio/ogg" ></source>
            </audio>
            <audio id="audio-star2">
                <source src="{{url('/')}}/audio/162467_311243-lq.ogg" type="audio/ogg"></source>
            </audio>
            <audio id="audio-star3">
                <source src="{{url('/')}}/audio/162467_311243-lq.ogg" type="audio/ogg"></source>
            </audio>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="resultsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {{-- <div class="modal-dialog modal-lg" role="document"> --}}
    <div class="modal-dialog modal-custom-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resultsModalLabel">
                    Tema: {{ $currentTheme->name }}
                </h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <h2 id="title-value">
                        <span id="map-value"></span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-right">
                        Rätt svar:
                    </p>
                </div>
                <div class="col-sm-8">
                    <p>
                        <span id="answer-value"></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-right">
                        Antal stjärnor:
                    </p>
                </div>
                <div class="col-sm-8">
                    <p>
                        <span id="stars-value"></span>
                        <span id="new-highscore"></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-right">
                        Antal steg:
                    </p>
                </div>
                <div class="col-sm-8">
                    <p>
                        <span id="steps-value"></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-right">
                        Du är just nu i:
                    </p>
                </div>
                <div class="col-sm-8">
                    <p>
                        <span id="bonus-value"></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-right">
                        Du har besökt:
                    </p>
                </div>
                <div class="col-sm-8">
                    <p>
                        <span id="round-value"></span>
                    </p>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <a href="{{url('/')}}/scan" type="button" class="btn btn-primary btn-continue">Fortsätt spela</a>
        </div>
    </div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.min.css">
<link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.structure.min.css">
<link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.theme.min.css">
<script src="{{url('/')}}/js/jquery-ui.min.js"></script>
     <script type="text/javascript">
        // Initialize tooltip component
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
{{-- <script src="external/jquery/jquery.js"></script> --}}


<!-- {{-- <script src="{{url('/')}}/js/countPoint.js"></script> --}} -->

<script type="text/javascript">

$(document).ready(function(){

    $('#question-video').click(function(event) {
        if (event.target.paused) {
            $(".play-button-video-question").hide();
            event.target.play();
        }
        else {
            $(".play-button-video-question").show();
            event.target.pause();
        }
    });


    var starsAmount = 3;
    $('.button-answer').click(function(){

        if ($(this).hasClass('correct-answer')) {

            $(this).addClass('answered-right');

            // Pausa video om den finns
            if (document.getElementById("question-video")) {
                $(".play-button-video-question").show();
                document.getElementById("question-video").pause();
            }

            $('#answer-message').text('Rätt svar! Bra jobbat!');
            document.getElementById("audio-right").play();

            // Ta bort click event från svarsknapparna
            $('.button-answer').off("click");

            // Hämta den data som ska skickas med till servern
            var placeId = $('#placeId').val();
            var gameId = $('#gameId').val();
            var questionId = $('#questionId').val();

            // Skicka in data med AJAX POST
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('/')}}/question/store",
                data: {placeId: placeId, gameId: gameId, questionId: questionId, starsAmount: starsAmount},
                dataType: 'json',
                success: function(data) { // Om det LYCKADES att spara data
                    console.log(data);
                    $("#answer-value").html(data['correctAnswer']);

                    var starsHtml = "";
                    var numberOfStars = parseInt(data['numberOfStars'])
                    if (numberOfStars === 0) {
                        starsHtml = "Inga stjärnor";
                    }
                    else {
                        var i = 0;
                        while (i < numberOfStars) {
                            // Lägg in en stjärnbild
                            starsHtml += "<img src='{{url('/')}}/images/icon-star.png' alt='Stjärna' class='star-score-img'>";
                            i++;
                        }
                    }

                    $("#stars-value").html(starsHtml);

                    $("#steps-value").html(data['distanceAmount']);

                    $("#map-value").append(data['mapName'] + "->");
                    $("#map-value").append(data['areaName'] + "->");
                    $("#map-value").append(data['bonusGame']);

                    $("#bonus-value").append(data['bonusGame']);
                    $(".btn-primary").attr("href", data['bonusUrl']);

                    $("#round-value").append(data['placeActiveRound']);

                    $('.star-score-img').off('click').on('click', function() {
                        // Hindrar animationen från att köras mer en engång i taget
                        if ($(this).is(':animated')) {
                            return false;
                        }
                        // Kör animation
                        $(this).effect( "bounce", "slow");

                        // Spola tillbaka ljudeffekten och spela upp den
                        var starAudio = document.getElementById("audio-star1");
                        starAudio.volume = 0.4;
                        starAudio.pause();
                        starAudio.currentTime = 0;
                        starAudio.play();
                    });

                    setTimeout(function(){
                        // Visa modal
                        $('#resultsModal').modal({
                            backdrop: "static"
                        });
                    }, 1000);

                    $('#resultsModal').on('shown.bs.modal', function (e) {
                        $.each($(".star-score-img"), function(i, el){
                            setTimeout(function(){
                                $(el).show();
                                $(el).effect( "bounce", "slow");

                                var starAudio = document.getElementById("audio-star"+(i+1));
                                starAudio.volume = 0.4;
                                starAudio.pause();
                                starAudio.currentTime = 0;
                                starAudio.play();

                                if ((i+1) == numberOfStars) {
                                    if(data['isNewHighscore'] == true){
                                        $("#new-highscore").html("Du har fått nytt rekord i " + data['bonusGame']);
                                    }
                                }

                            },500 + ( i * 400 ));
                        });
                    });

                    $('#resultsModal').on('hide.bs.modal', function (e) {
                        $.each($(".star-score-img"), function(i, el){
                            var starAudio = document.getElementById("audio-star"+(i+1));
                            starAudio.pause();
                            starAudio.currentTime = 0;
                        });
                    });

                }, // SLUT - Om det LYCKADES att spara data
                error: function(xhr, textStatus, errorThrown,) { // Om det MISSLYCKADES att spara data
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            }); // SLUT - Om det MISSLYCKADES att spara data
        }

        if (!($(this).hasClass("correct-answer"))){
            $(this).off("click");
            console.log("It's wrong dude");
            $(this).addClass('answered-wrong');
            $('#answer-message').text('Fel svar! Försök igen.');
            document.getElementById("audio-wrong").play();
            starsAmount = starsAmount - 1;
            console.log(starsAmount);
        };
    });
});
</script>
</body>
</html>
