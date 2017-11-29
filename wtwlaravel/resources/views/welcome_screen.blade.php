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
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">

            <div class="col col-md-3">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Hej!" data-content="Välkommen till Walk the Ward. På den här sidan väljer du en karaktär genom att klicka på ikonen. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                    <!--<i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>-->

                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-bottom: 50px;">

            <div class="col-md-8">
                <h1 class="text-center">Walk The Ward </h1>
                <h2 class="text-center">Vandring i vården - Ett aktivitetsspel </h2>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <a href="{{url('/')}}/registration" id="link-new-user">
                    <div class="btn-new-user">
                        <img src="{{url('/')}}/images/start-user.png" alt="user" height="190px">
                        <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{url('/')}}/js/tether.min.js"></script>
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
    </script>
</body>
</html>
