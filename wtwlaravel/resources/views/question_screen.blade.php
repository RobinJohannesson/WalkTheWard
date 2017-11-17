<!doctype html>
<html lang="en">
<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <p class="text-center">{{ $currentTheme->name }}</p>
            </div>
            <div class="col col-md-3">
                <img src="./images/help.png" alt="Help">
                <p class="text-center">Hjälp</p>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-8">
                {{-- <p class="questionparagraph">Malmö allmänna sjukhus anlades på Slottsgatan 22 mitt emot Kungsparken i Malmö, år 1857?.</p> --}}
                <p class="questionparagraph">{{ $questionObjToShow->question }}</p>

            </div>
            <div class="col-md"></div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-6">
                <p class="text-center">Rätt svar!</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6"><img src="./images/pic1.png" alt="diabetes" height="300px" width="auto" class="images-responsive center-block">
            </div>
            <div class="col-md-6">
                <button class="button">Svar1</button>
                <button class="button">Svar2</button>
                <button class="button">Svar3</button>
                <button class="button">Svar4</button>
                </div>
         </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
