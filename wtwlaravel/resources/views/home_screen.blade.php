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
                <div class="text-center">
                <i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>
                </div>
            </div>



        </div>

        </div>
        <div class="row justify-content-start">
                <div class="col-md-6">
                    <img src="../images/map-pic.png" class="home_map_pic" alt="map">

                </div>
                 <div class="col-md-6">
                     <h1 class="text-center">Syd Östra Skåne</h1>
                     <p>Antal poäng: {{$totalStars}}/{{$maxStars}}</p>
                     <p>Antal steg: 340</p>
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

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // $(document).ready(function(){
        //     $('.button-theme').click(function(){
        //         var themeId = $(this).attr("data-theme-id");
        //         console.log(themeId);
        //         var gameId = $('#gameId').val();
        //         console.log(gameId);
        //         $.ajax({
        //             type: "POST",
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             url: "{{url('/')}}/theme/store",
        //             data: {themeId: themeId, gameId: gameId},
        //             dataType: 'json',
        //             success: function(data) { // Om det LYCKADES att spara data
        //                 console.log(data);
        //                 window.location.href = "{{url('/')}}/scan";
        //
        //             }, // SLUT - Om det LYCKADES att spara data
        //             error: function(xhr, textStatus, errorThrown,) { // Om det MISSLYCKADES att spara data
        //                 console.log(xhr);
        //                 console.log(textStatus);
        //                 console.log(errorThrown);
        //             }
        //         }); // SLUT - Om det MISSLYCKADES att spara data
        //     });
        // });
    </script>
</body>
</html>
