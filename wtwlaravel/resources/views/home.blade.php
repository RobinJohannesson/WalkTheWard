@extends('layouts.app')

@section('title', 'Hem')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-home.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div id="spacerow">
            <div class="row justify-content-end">

                <div class="col-md-8">
                    <button type="button" id="exit_button">Avsluta</button>
                </div>
                <div class="col col-md-3">
                    <div class="text-right">
                        <a href="#" data-toggle="popover" data-trigger="focus" title="Hemskärm!" data-content="Den här sidan är hemskärmen. Här kan du titta på statistiken och ta reda på dina poäng och steg hittills. Du kan också avsluta spelet genom att klicka på knappen “Avsluta”. Om du vill fortsätta spela så klickar du knappen “Spela”. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                    </div>
                </div>



            </div>

        </div>
        <div class="row justify-content-start">
            <div class="col-md-6">
                <img src="{{url('/')}}/images/map/map-white-stroke.png" class="map home_map_map" alt="Karta kommer snart!" usemap="#Map"/>


                <map name="Map" id="Map">

                    <area rel="1" id="1Place" alt="Helsingborg" title="Helsingborg" coords="67,236,10" shape="circle" class="1City">
                    <area rel="1" id="2Place" alt="Ängelholm" title="Ängelholm" coords="113,141,10" shape="circle" class="1City">
                    <area rel="1" id="3Place" alt="Båstad" title="Båstad" coords="119,43,10" shape="circle" class="1City">
                    <area rel="1" id="4Place" alt="Örkelljunga" title="Örkelljunga" coords="231,120,10" shape="circle" class="1City">
                    <area rel="1" id="5Place" alt="Perstorp" title="Perstorp" coords="253,203,10" shape="circle" class="1City">
                    <area rel="1" id="6Place" alt="Klippan" title="Klippan" coords="171,209,10" shape="circle" class="1City">
                    <area rel="1" id="7Place" alt="Svalöv" title="Svalöv" coords="175,304,10" shape="circle" class="1City">
                    <area rel="1" id="8Place" alt="Landskrona" title="Landskrona" coords="109,342,10" shape="circle" class="1City">

                    <area alt="" title="" shape="poly" class="1" coords="169,356,159,368,135,368,134,360,127,346,120,345,110,348,103,334,101,316,89,300,88,277,73,264,70,243,55,220,38,196,33,175,29,165,26,142,18,125,7,111,21,111,33,121,47,126,55,134,62,138,69,152,93,157,107,149,116,131,116,125,94,105,96,97,91,88,89,74,81,71,75,65,58,55,59,43,81,21,96,24,106,34,120,43,129,42,139,35,152,40,152,55,151,68,157,83,177,87,192,90,211,90,223,103,242,95,254,79,270,66,285,59,297,59,304,52,314,61,334,63,333,73,312,84,308,104,307,123,293,124,282,136,287,161,293,172,287,183,292,193,291,214,284,219,295,237,300,238,292,251,290,260,266,264,254,282,242,308,240,329,227,329,215,335,200,337,187,350,190,364" />

                    <area rel="2" id="9Place" alt="Kristianstad" title="Kristianstad" coords="525,263,10" shape="circle" class="2City">
                    <area rel="2" id="10Place" alt="Åhus" title="Åhus" coords="551,327,10" shape="circle"class="2City">
                    <area rel="2" id="11Place" alt="Degeberga" title="Degeberga" coords="496,367,10" shape="circle"class="2City">
                    <area rel="2" id="12Place" alt="Tollarp" title="Tollarp" coords="464,317,10" shape="circle"class="2City">
                    <area rel="2" id="13Place" alt="Sösdala" title="Sösdala" coords="403,224,10" shape="circle"class="2City">
                    <area rel="2" id="14Place" alt="Hässleholm" title="Hässleholm" coords="432,176,10" shape="circle"class="2City">
                    <area rel="2" id="15Place" alt="Broby" title="Broby" coords="520,137,10" shape="circle"class="2City">
                    <area rel="2" id="16Place" alt="Bromölla" title="Bromölla" coords="615,234,10" shape="circle"class="2City">

                    <area alt="" title="" shape="poly" class="2" coords="516,395,512,414,482,407,479,406,463,417,450,407,454,392,451,379,432,364,442,350,440,328,430,313,423,311,405,327,399,317,391,302,382,294,368,290,357,289,369,274,364,262,363,250,357,246,340,237,337,223,329,218,316,220,312,231,295,222,303,195,296,183,305,173,292,139,302,130,313,127,318,108,318,91,339,79,343,64,367,61,382,55,395,47,408,49,420,54,433,52,454,37,467,37,479,36,484,20,491,6,501,7,504,16,529,23,539,25,549,20,573,32,613,42,613,50,607,57,606,64,592,67,585,80,586,100,580,119,582,134,589,149,590,164,598,170,604,165,616,173,631,172,633,211,631,235,613,268,600,267,595,283,583,288,570,306,560,309,556,320,541,343,528,359" />

                    <area rel="3" id="17Place" alt="Eslöv" title="Eslöv" coords="253,336,10" shape="circle" class="3City">
                    <area rel="3" id="18Place" alt="Stehag" title="Stehag" coords="275,314,10" shape="circle" class="3City">
                    <area rel="3" id="19Place" alt="Höör" title="Höör" coords="311,295,10" shape="circle" class="3City">
                    <area rel="3" id="20Place" alt="Fulltofta" title="Fulltofta" coords="333,320,10" shape="circle" class="3City">
                    <area rel="3" id="21Place" alt="Hörby" title="Hörby" coords="355,337,10" shape="circle" class="3City">
                    <area rel="3" id="22Place" alt="Långaröd" title="Långaröd" coords="403,382,10" shape="circle" class="3City">
                    <area rel="3" id="23Place" alt="Östraby" title="Östraby" coords="336,399,10" shape="circle" class="3City">
                    <area rel="3" id="24Place" alt="Hurva" title="Hurva" coords="287,364,10" shape="circle" class="3City">

                    <area alt="" title="" shape="poly" class="3" coords="312,442,279,420,261,413,246,413,243,401,220,390,222,369,215,361,200,358,209,346,227,341,240,338,250,330,248,311,263,285,271,272,295,266,301,256,308,242,318,238,322,228,330,229,332,240,340,251,356,255,351,264,358,275,345,283,348,300,367,297,383,304,387,318,394,324,395,332,403,336,425,321,431,328,427,335,432,341,435,350,423,361,426,369,434,375,435,381,445,384,446,396,439,405,427,418,411,410,387,404,377,413,374,422,362,419,354,427,333,419" />

                    <area rel="4" id="25Place" alt="Malmö" title="Malmö" coords="159,484,10" shape="circle" class="4City">
                    <area rel="4" id="26Place" alt="Lund" title="Lund" coords="197,444,10" shape="circle" class="4City">
                    <area rel="4" id="27Place" alt="Revingehed" title="Revingehed" coords="280,443,10" shape="circle" class="4City">
                    <area rel="4" id="28Place" alt="Svedala" title="Svedala" coords="209,531,10" shape="circle" class="4City">
                    <area rel="4" id="29Place" alt="Skurup" title="Skurup" coords="283,542,10" shape="circle" class="4City">
                    <area rel="4" id="30Place" alt="Smygehamn" title="Smygehamn" coords="257,621,10" shape="circle" class="4City">
                    <area rel="4" id="31Place" alt="Trelleborg" title="Trelleborg" coords="192,607,10" shape="circle" class="4City">
                    <area rel="4" id="32Place" alt="Höllviken" title="Höllviken" coords="135,589,10" shape="circle" class="4City">

                    <area alt="" title="" shape="poly" class="4" coords="334,595,323,604,297,606,285,612,258,630,235,630,187,607,172,612,153,602,139,593,112,597,95,596,102,580,109,591,131,588,135,572,143,570,140,556,132,544,122,525,121,500,151,479,157,470,169,471,175,459,169,434,155,418,145,418,146,406,128,410,132,398,141,391,138,376,154,373,161,376,172,364,189,370,199,370,211,369,211,391,225,406,235,408,237,421,268,422,303,446,316,450,326,464,317,475,304,486,300,503,301,514,311,528,337,539,340,553,331,575" />

                    <area rel="5" id="33Place" alt="Ystad" title="Ystad" coords="396,584,10" shape="circle" class="5City">
                    <area rel="5" id="34Place" alt="Sjöbo" title="Sjöbo" coords="360,477,10" shape="circle" class="5City">
                    <area rel="5" id="35Place" alt="Ravlunda" title="Ravlunda" coords="497,434,10" shape="circle" class="5City">
                    <area rel="5" id="36Place" alt="Kivik" title="Kivik" coords="520,464,10" shape="circle" class="5City">
                    <area rel="5" id="37Place" alt="Simrishamn" title="Simrishamn" coords="554,530,10" shape="circle" class="5City">
                    <area rel="5" id="38Place" alt="Hammenhög" title="Hammenhög" coords="496,558,10" shape="circle" class="5City">
                    <area rel="5" id="39Place" alt="Kåseberga" title="Kåseberga" coords="472,608,10" shape="circle" class="5City">
                    <area rel="5" id="40Place" alt="Tomelilla" title="Tomelilla" coords="441,523,10" shape="circle" class="5City">

                    <area alt="" title="" shape="poly" class="5" coords="514,421,516,443,522,453,533,460,535,487,547,501,556,513,555,521,562,531,552,554,526,586,519,597,505,619,472,613,441,588,421,584,414,584,400,594,376,587,355,587,343,592,338,578,348,560,346,540,346,535,317,523,308,508,315,484,333,471,335,459,322,446,334,431,353,434,362,428,377,430,388,413,413,419,427,427,442,411,450,424,478,417,492,422" />

                </map>

            </div>
            <div class="col-md-6">
                <h1 class="text-center" id="mapArea-value">{{$mapArea}}</h1>
                <p style="text-align: center;">Antal poäng: <span id="totalStars">{{$totalStars}}</span>/<span id="maxStars">{{$maxStars}}</span></p>
                <p style="text-align: center;">Antal steg: {{$distanceAmount}}</p>
                <!--<button type="button" class="button exercise_button">Dagens rörelse</button> -->
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col col-md-4">
            </div>
            <div class="col col-md-4">
            </div>
            <div class="col col-md-4">
                <button type="button" class="button exercise_button">Prova dagens rörelse</button>
                <button type="button" id="homeplaybutton">Spela --></button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{-- <div class="modal-dialog modal-lg" role="document"> --}}
            <div class="modal-dialog modal-custom-width" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resultsModalLabel">Dagens rörelse</h5>
                    </div>
                    <div class="modal-body">
                        <video id="movement-video" loop="loop">
                            <source src="{{url('/')}}/videos/exercise/balansen.mp4" type="video/mp4"></source>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <p>
                            Utförde du dagens rörelse?
                        </p>
                        <input class="todayMovementButton" type="submit" value="Ja">
                        <input class="todayMovementButton" type="submit" value="Nej">
                        <input class="todayMovementButton" type="submit" value="Vill inte">
                    </div>
                </div>
            </div>
        </div>

        <input id="gameId" type="hidden" name="gameId" value="{{$gameId}}">
    @endsection



    @section('body-script')
        <!-- Add maphilight plugin -->
        <script type="text/javascript" src="{{url('/')}}/js/jquery.maphilight.js"></script>
        <script src="{{url('/')}}/js/jquery.rwdImageMaps.min.js"></script>


        <script type="text/javascript">
        $.fn.maphilight.defaults = {
            fill: true,
            fillColor: 'a4a4a4',
            fillOpacity: 1,
            stroke: true,
            strokeColor: '000000',
            strokeOpacity: 1,
            strokeWidth: 1,
            fade: true,
            alwaysOn: false,
            neverOn: false,
            groupBy: 'rel',
            wrapClass: true,
            shadow: false,
            shadowX: 0,
            shadowY: 0,
            shadowRadius: 0,
            shadowColor: 'ffffff',
            shadowOpacity: 0.8,
            shadowPosition: 'outside',
            shadowFrom: false
        }
        $(document).ready(function(e) {
            var placeIdlist = {{json_encode($placeIdlist)}};
            console.log(placeIdlist);
            $(function() {
                $('.map').maphilight();
                for (index = 0; index < placeIdlist.length; ++index) {
                    console.log(placeIdlist[index]);
                    $("#" + placeIdlist[index].toString() + "Place").data('maphilight', {fillColor: '00ff00', strokeColor: '000000', alwaysOn: true}).trigger('alwaysOn.maphilight');
                    $("#" + placeIdlist[index].toString() + "Place").addClass("selected");
                }
                var counter = 0;
                while (counter < 6) {
                    // $("." + counter.toString() + "City").data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
                    counter += 1;
                    $("." + counter.toString()).data('maphilight', {fillOpacity: 0});
                }
            });
            $('#movement-video').click(function(event) {
                if (event.target.paused) {
                    event.target.play();
                }
                else {
                    event.target.pause();
                }
            });
            $('img[usemap]').rwdImageMaps();
            $('area').click(function(){
                $(".loader").show();
                var areaId = $(this).attr("class");
                console.log(areaId);
                var gameId = $('#gameId').val();
                console.log(gameId);
                if (areaId.indexOf('City') >= 0) {
                    areaId = areaId.substring(0, areaId.length-4);
                    areaId = areaId[0];
                }
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/')}}/home",
                    data: {areaId: areaId, gameId: gameId},
                    dataType: 'json',
                    success: function(dataSuccess) { // Om det LYCKADES att spara data
                        console.log(dataSuccess);

                        // Kartan highlightar städer beroende på area och släcker alla andra
                        var counter = 0;
                        while (counter < 6) {
                            $("." + counter.toString() + "City").data('maphilight', {alwaysOn: false, neverOn: true}).trigger('alwaysOn.maphilight');
                            counter += 1;
                        }
                        $("." + areaId + "City").data('maphilight', {alwaysOn: true, neverOn: false}).trigger('alwaysOn.maphilight');
                        // hämtar alla som är markerade inom area
                        if ($("." + areaId + "City").hasClass('selected')) {
                            var changeThese = $("." + areaId + "City").hasClass('selected');
                            $("." + areaId + "City.selected").data('maphilight', {fillColor: '00ff00', strokeColor: '000000', alwaysOn: true, neverOn: false}).trigger('alwaysOn.maphilight');
                        }
                        $('#totalStars').html(dataSuccess['totalStars']);
                        $('#maxStars').html(dataSuccess['maxStars']);
                        $('#mapArea-value').html(dataSuccess['mapArea']);

                        $('.loader').hide();
                    }, // SLUT - Om det LYCKADES att spara data
                    error: function(xhr, textStatus, errorThrown,) { // Om det MISSLYCKADES att spara data
                        console.log(xhr);
                        console.log(textStatus);
                        console.log(errorThrown);
                        $('.loader').hide();
                    }
                }); // SLUT - Om det MISSLYCKADES att spara data
            });

            $('#homeplaybutton').click(function(){
                window.location.href = "{{url('/')}}/map";
            });

            $('#exit_button').click(function(){
                window.location.href = "{{url('/')}}/statistics";
            });

            $('.exercise_button').click(function(){
                var video = $("#movement-video");
                $("#movement-video").height("100%");
                $("#movement-video").width("100%");
                $('#movementModal').modal({
                    backdrop: "static"
                });
                video[0].play();
            });
            $('.todayMovementButton').click(function() {
                var video = $("#movement-video");
                video[0].pause();
                $('#movementModal').modal('hide');
            });
        });
        </script>
    @endsection
