<!doctype html>
<html lang="sv-se">
<head>
    <title>@yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <link rel="icon" type="image/png" href="{{url('/')}}/images/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="{{url('/')}}/images/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="{{url('/')}}/images/favicon-96x96.png" sizes="96x96">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{url('/')}}/css/bootstrap-4.0.0-beta.2.min.css"> --}}

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Averia+Sans+Libre|Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Autour+One" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/font-awesome.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style-main.css">
    @yield('head-stylesheet')

    @yield('head-script')

</head>
<body>
    <div class="loader"></div>
    @yield('body')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    {{-- <script src="{{url('/')}}/js/jquery-3.2.1.min.js"></script> --}}
    {{-- <script src="{{url('/')}}/js/popper-1.12.3.min.js"></script> --}}
    {{-- <script src="{{url('/')}}/js/bootstrap-4.0.0-beta.2.min.js"></script> --}}
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
    @yield('body-script')
</body>
</html>
