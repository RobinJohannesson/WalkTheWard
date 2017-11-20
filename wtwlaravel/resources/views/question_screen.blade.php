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
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-6">
                <p class="text-center">Tema: {{ $currentTheme->name }}</p>
            </div>
            <div class="col col-md-3">
                <img src="./images/help.png" alt="Help">
                <p class="text-center">Hjälp</p>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-8">
                {{-- <p class="questionparagraph">Malmö allmänna sjukhus anlades på Slottsgatan 22 mitt emot Kungsparken i Malmö, år 1857?.</p> --}}
                <p class="questionparagraph">{{ $question->question }}</p>

            </div>
            <div class="col-md"></div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-6">
                <p id="answer-message" class="text-center">Rätt svar!/Fel svar!</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($question->imageSource)
                    <img src="{{url('/')}}/images/question_images/{{$question->imageSource}}"
                    alt="diabetes" height="300px" width="auto" class="images-responsive center-block">
                @elseif ($question->videoSource)
                    <video autoplay style="width: 100%; max-height: 300px;" controls>
                        <source src="{{url('/')}}/videos/question_videos/{{$question->videoSource}}" type="video/mp4">
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
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resultsModal" data-backdrop="static">
            Launch result modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="resultsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2 id="title-value">
                            #YOLO
                        </h2>
                        <p>
                            Rätt svar: <span id="answer-value"></span>
                        </p>
                        <p>
                            Antal stjärnor: <span id="stars-value"></span>
                        </p>
                        <p>
                            Antal steg: <span id="steps-value"></span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
        <!-- {{-- <script src="{{url('/')}}/js/countPoint.js"></script> --}} -->

        <script type="text/javascript">
        $(document).ready(function(){
            var starsAmount = 3;
            $("button").click(function(){
                $(this).hide();
                console.log(this.className);
                console.log($(this).attr('class').split(' ')[1]);
                if ($(this).hasClass("correct-answer")){
                    console.log("smartass");
                    $("button").off("click");
                    var placeId = $('#placeId').val();
                    var gameId = $('#gameId').val();
                    var questionId = $('#questionId').val();
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{url('/')}}/question/store",
                        data: {placeId: placeId, gameId: gameId, questionId: questionId, starsAmount: starsAmount},
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            console.log(parseInt(data['numberOfStars']));
                            console.log(data['numberOfStars']);
                            $("#answer-value").html(data['correctAnswer']);

                            var starsHtml = "";
                            var i = 0;
                            var numberOfStars = parseInt(data['numberOfStars'])
                            // var numberOfStars = 2;
                            if (numberOfStars === 0) {
                                starsHtml = "Inga stjärnor";
                            }
                            else {
                                while (i < numberOfStars) {
                                    starsHtml += "<img src='{{url('/')}}/images/icon-star.png' alt='Stjärna'>";
                                    i++;
                                    console.log("while was fired!");
                                }
                            }


                            $("#stars-value").html(starsHtml);
                            $("#steps-value").html('9001');

                            $('#resultsModal').modal({
                                backdrop: "static"
                            });
                            $('#resultsModal').modal('show');
                        },
                        error: function(xhr, textStatus, errorThrown,) {
                            console.log(xhr);
                            console.log(textStatus);
                            console.log(errorThrown);
                        }
                    });
                };

                if (!($(this).hasClass("correct-answer"))){
                    console.log("It's wrong dude");
                    starsAmount = starsAmount - 1;
                    console.log(starsAmount);
                };
            });
        });
        </script>
    </body>
    </html>
