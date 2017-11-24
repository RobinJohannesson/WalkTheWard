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
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <div class="text-center">
                  <i class="fa fa-question-circle fa_custom fa-3x" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
          
            <div class="col-md-6">
                <h1 class="text-center">Walk the Ward</h1>
                
            </div>
            

        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="btn-new-user">
                    <video id="preview"></video>
                    <script type="text/javascript">
                    let opts = {
                        // Whether to scan continuously for QR codes. If false, use scanner.scan() to manually scan.
                        // If true, the scanner emits the "scan" event when a QR code is scanned. Default true.
                        continuous: true,

                        // The HTML element to use for the camera's video preview. Must be a <video> element.
                        // When the camera is active, this element will have the "active" CSS class, otherwise,
                        // it will have the "inactive" class. By default, an invisible element will be created to
                        // host the video.
                        video: document.getElementById('preview'),

                        // Whether to horizontally mirror the video preview. This is helpful when trying to
                        // scan a QR code with a user-facing camera. Default true.
                        mirror: true,

                        // Whether to include the scanned image data as part of the scan result. See the "scan" event
                        // for image format details. Default false.
                        captureImage: false,

                        // Only applies to continuous mode. Whether to actively scan when the tab is not active.
                        // When false, this reduces CPU usage when the tab is not active. Default true.
                        backgroundScan: false,

                        // Only applies to continuous mode. The period, in milliseconds, before the same QR code
                        // will be recognized in succession. Default 5000 (5 seconds).
                        refractoryPeriod: 5000,

                        // Only applies to continuous mode. The period, in rendered frames, between scans. A lower scan period
                        // increases CPU usage but makes scan response faster. Default 1 (i.e. analyze every frame).
                        scanPeriod: 5
                    };

                    let scanner = new Instascan.Scanner(opts);
                    scanner.addListener('scan', function (content) {
                        console.log(content);
                        window.location.href = content;
                    });
                    Instascan.Camera.getCameras().then(function (cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                        } else {
                            console.error('No cameras found.');
                        }
                    }).catch(function (e) {
                        console.error(e);
                    });
                    </script>
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
