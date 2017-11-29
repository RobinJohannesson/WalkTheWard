<!doctype html>
<html lang="en">
<head>
    <title>Walk the Ward</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
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
                    <i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" >
            <div class="col-md-6" style="padding: 15px 60px 15px 60px"id="registration">
                <h1 align="center">Registrering</h1>
                <form action="{{{ url("registration") }}}" method="POST">
                {{ csrf_field() }}
                <p>Ålder: </p>
                <input type="number" name="age" style="border: 1px solid; border-radius: 5px;">
                <br>
                <br><p>Kön:</p>
                    
                    <label class="radio-inline"><input type="radio" name="gender" value="Kvinna"  class="registration_radio">Kvinna<br></label>
                <label class="radio-inline"><input type="radio" name="gender" value="Man">Man<br></label>
                <label class="radio-inline"><input type="radio" name="gender" value="Annat"> Annat<br></label>
                <br>
                    
                <br><p>Typ av rum:</p>
                <label class="radio-inline"><input type="radio" name="roomType" value="1"> singelrum<br></label>
                <label class="radio-inline"><input type="radio" name="roomType" value="2">dubbelrum<br></label><br>
                <div class="row justify-content-end">
                    <div class="col-md-3">
                        <br><input type="submit" id="submit_button" value="Skicka"><br>
                    </div>
                </div>
            </form>
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
