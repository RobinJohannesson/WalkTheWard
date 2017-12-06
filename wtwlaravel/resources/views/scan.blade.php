@extends('layouts.app')

@section('title', 'Skanna QR-kod')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-scan.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div class="row justify-content-md-end">
            <div class="col-md-8 order-2 order-md-1">
                <h1 class="text-center">Skanna en QR-KOD</h1>
            </div>
            <div class="col col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Skanna en QR-kod!" data-content="Här skannar du en QR-kod genom att hålla upp kameran med din surfplatta eller telefon. Koderna finns uppsatta i korridoren på avdelningen." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-6 preview-col">
                <div class="col video-container">
                    <video id="preview"></video>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-3">
                <button type="button" class="button change_theme_button">Ändra tema</button>
            </div>
        </div>
    @endsection



    @section('body-script')
        <script type="text/javascript" src="{{url('/')}}/js/instascan.min.js"></script>
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
        <script type="text/javascript">
        $(document).ready(function(e) {

            // $("#preview").height("100%");
            // $("#preview").width("100%");

            $('.change_theme_button').click(function(){
                window.location.href = "{{url('/')}}/theme";
            });
        });
        </script>
    @endsection
