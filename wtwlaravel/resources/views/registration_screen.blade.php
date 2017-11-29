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
    <link rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style-registration.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <!-- Load scripts before JS? -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">-->
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Registrera dig" data-content="Skriv in din ålder, kön och vilket typ av rum du bor i på din vistelse." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                    <!--<i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>-->
                </div>
            </div>
        </div>
        <div class="row justify-content-center" >
            <div class="col-md-6" style="padding: 15px 60px 15px 60px"id="registration">
                <h1 align="center">Registrering</h1>
                <div class="row no-gutters">
                    <div class="col-sm-8">

                        <form action="{{{ url("registration/store") }}}" method="POST" id="registrationForm">
                            {{ csrf_field() }}
                            <div class="row no-gutters">
                                <div class="col-sm-8">
                                    <p>Ålder: </p>
                                    <input type="number" name="age" style="border: 1px solid; border-radius: 5px;" required>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-sm-12">
                                    <br>
                                    <p>Kön:</p>

                                    <label class="radio-inline"><input type="radio" name="gender" value="Kvinna" required class="registration_radio">Kvinna<br></label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="Man" required class="registration_radio">Man<br></label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="Annat" required class="registration_radio"> Annat<br></label>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-sm-12">
                                    <br>
                                    <p>Typ av rum:</p>
                                    <label class="radio-inline"><input type="radio" name="roomType" value="1" required class="registration_radio"> singelrum<br></label>
                                    <label class="radio-inline"><input type="radio" name="roomType" value="2" required class="registration_radio">dubbelrum<br></label><br>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-3 align-center">
                                    <br><input type="submit" id="submit_button" value="Registrera"><br>
                                </div>
                            </div>
                            <input id="characterId" type="hidden" name="characterId" value="">
                        </form>
                    </div>
                    <div class="col-sm-4 text-center">
                        <img class="choosenCharacterImage" data-character-id="7" src="{{url('/')}}/images/characters/bigpete.gif" alt="En vanlig karaktär">
                        <a href="#" class="btn btn-secondary text-center" data-toggle="modal" data-target="#characterModal" id="openCharacterModal" type="button" >Vill du välja karaktär?</a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="characterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        {{-- <div class="modal-dialog modal-lg" role="document"> --}}
        <div class="modal-dialog modal-custom-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="resultsModalLabel">
                        Karaktärer
                    </h1>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 id="title-value" class="text-center">
                            Välj en karaktär som du gillar
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        @if ($characters)
                            @foreach ($characters as $c)
                                <img class="characterImage" data-character-id="{{$c->id}}" src="{{url('/')}}/images/characters/{{$c->imageSource}}" alt="{{$c->name}}">
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-dismiss="modal">Tillbaka</a>
            </div> --}}
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
    // Initialize tooltip component
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Initialize popover component
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(document).ready(function(){

        $("#characterRegistration").on("click", function (e) {

            if ($("#registrationForm")[0].checkValidity()){
                $("#registrationForm").submit();
                e.preventDefault();
            }
            else {
                console.log("Something is Required!");
            }
        });
        // <img class="choosenCharacterImage" data-character-id="7" src="{{url('/')}}/images/characters/bigpete.gif" alt="En vanlig karaktär">

        $(".characterImage").click(function(event) {
            $("#characterId").val($(this).attr('data-character-id'));
            var characterImageSrc = $(this).attr('src');
            console.log(characterImageSrc);
            console.log($("#characterId").val());
            $(".choosenCharacterImage").attr("src", characterImageSrc);
            $('#characterModal').modal('hide');

        });
        $('#characterRegistration').click(function(event) {
            var charId = $(".isSelected").attr("data-character-id");
        });
    });
    </script>
</body>
</html>
