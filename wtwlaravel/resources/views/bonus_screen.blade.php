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
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/style-bonus.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-3">
                <div class="text-right">
                    <i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true" style="position:static;"></i>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col">
                <div class="text-center puzzle">
                    <div class="row no-gutters puzzle-row justify-content-around">
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>{{$bonusGameId}}</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters puzzle-row justify-content-around">
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters puzzle-row justify-content-around">
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters puzzle-row justify-content-around">
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                        <div class="col-3 puzzle-piece">
                            <div>
                                <p>M</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <h1 id="bonus-word" class="text-center">
                    <span class="letter-m">_</span><span class="letter-a">_</span><span class="letter-l">_</span><span class="letter-m">_</span><span class="letter-ö">Ö</span>
                </h1>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function(e) {
        $('.puzzle-piece').on('click', function(event) {
            event.preventDefault();
            $(this).addClass('hidden-piece');
            $(this).children("div").children("p").hide();
        });
    });
    </script>
</body>
</html>
