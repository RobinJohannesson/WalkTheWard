<!doctype html>
<html lang="en">
<head>
    <title>Walk the Ward</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/')}}/css/font-awesome.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style-welcome.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">

            <div class="col col-md-3">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Hej!"
                    data-content="Välkommen till Walk the Ward. På den här sidan väljer du en karaktär genom att klicka på ikonen. " style="white-space:nowrap;">
                    <img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark">
                </a>
                <!--<i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>-->

            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-bottom: 50px; margin-top: -45px;">

        <div class="col-md-8">
            <h1 class="text-center">Walk The Ward </h1>
            <h2 class="text-center">Vandring i vården - Ett aktivitetsspel </h2>
        </div>

    </div>


    @if ($Patient)
        <div id="modal-confirm-new-player" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="skapaNySpelare" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-center" id="modalLabelConfirmNewPlayer">Observera!</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <p>
                                    Det finns redan en spelare sparad på denna enheten!
                                </p>
                                <p>
                                    Om du redan har skapat en spelare tidigare under din vistelse kan du välja knappen med din valda karaktär för att fortsätta spela där du slutade.
                                </p>
                                <p>
                                    Är du säker på att du vill skapa en ny spelare?
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal">Close</button>

                        <a href="{{url('/')}}/registration" class="btn btn-warning" data-href="{{url('/')}}/registration" >
                            Skapa en ny spelare
                        </a>
                    </div>

                </div>
            </div>
        </div>

    @endif {{-- End Modal If Patient Exists --}}



    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            @if ($Patient)
                <a href="" id="link-new-user" data-toggle="modal" data-target="#modal-confirm-new-player">
                @else
                    <a href="{{url('/')}}/registration" id="link-new-user">
                    @endif
                    @if ($Patient)
                        <h3>Skapa en ny spelare?</h3>
                    @endif
                    <div class="btn-new-user">
                        <img src="{{url('/')}}/images/start-user.png" alt="user">
                        <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                    </div>
                </a>
            </div>
            @if ($Patient)
                <div class="col-md-5 text-center">
                    <a href="{{url('/')}}/home" id="link-current-user">
                        <h3>Fortsätt spela som tidigare spelare?</h3>
                        <div class="btn-current-user">
                            @if ($Character)
                                <img class="characterImage" data-patient-id="{{$Patient->id}}" data-character-id="{{$Character->id}}" src="{{url('/')}}/images/characters/{{$Character->imageSource}}" alt="{{$Character->name}}">
                            @else
                                <img src="{{url('/')}}/images/start-user.png" alt="Tidigare spelare" height="190px">
                                <p>
                                    Fortsätt spela ->
                                </p>
                            @endif
                        </div>
                    </a>
                </div>
            @endif


        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    {{-- <script src="{{url('/')}}/js/tether.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
    // Initialize tooltip component
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    // Initialize popover component
    $(function () {
        $('[data-toggle="popover"]').popover()
    });


    $(document).ready(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>
</body>
</html>
