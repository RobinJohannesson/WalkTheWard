<!doctype html>
<html lang="en">
<head>
    <title>Walk the Ward</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <img src="./images/help.png" alt="Help">
                <p class="text-center">Hjälp</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6"> 
                <h1 class="text-center">Statistik</h1>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="btn-new-u ser">
                    <form action="{{{ url("statistics/store") }}}" method="POST">
                        {{ csrf_field() }}
                        <p>Ska du gå hem?</p>
                        <input type="radio" name="hasGoneHome" value="1"> Ja<br>
                        <input type="radio" name="hasGoneHome" value="0"> Nej<br>
                        <p>Hur många dagar har du varit inlagd?</p>
                        <select number="5" name="dayAmount">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <p>Var spelet enkelt att spela?</p>
                        <input type="radio" name="wasEasyToPlay" value="1"> Ja<br>
                        <input type="radio" name="wasEasyToPlay" value="0"> Nej<br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
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
