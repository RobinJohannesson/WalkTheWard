@extends('layouts.app')

@section('title', 'Information och instruktioner')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/info_style.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <!-- Page container -->
    <div class="container-fluid">
        <!--
        <div class="row justify-content-end">
        <div class="col col-md-3">
        <div class="text-right">
        <a href="#" data-toggle="popover" data-trigger="focus" title="Syftet med Walk The Ward!" data-content="Här finns det information om spelet. När du slutar läsa om syftet med spelet kan du klicka på Fortsätt knappen för att gå vidare. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
    </div>
</div>
</div>
-->
<div class="container">
    <div class="row justify-content-center" id="info-container">

        <!-- Information Carousel -->
        <div id="info-carousel" class="carousel slide" data-ride="carousel" data-interval="false">

            <!-- Controls -->
            <ol class="carousel-indicators">
                <li data-target="#info-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#info-carousel" data-slide-to="1"></li>
                <li data-target="#info-carousel" data-slide-to="2"></li>
            </ol>

            <!-- Slides -->
            <div class="carousel-inner">

                <div class="carousel-item active" id="1">
                    <div class="row justify-content-end">
                        <div class="col col-md-3">
                            <div class="text-right">
                                <a href="#" data-toggle="popover" data-trigger="focus" title="Syftet med Walk The Ward!" data-content="Här finns det information om spelet. När du slutar läsa om syftet med spelet kan du klicka på knappen Fortsätt för att gå vidare. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md">
                            <h1 class="text-center"><strong>Syftet med spelet</strong></h1>
                        </div>
                    </div>
                    <p>Spelet heter ”Walk the Ward” eller på svenska ”Vandring i vården”. Spelet går ut på att du går runt i Skåne och på vägen besvarar frågor med olika tema som du själv väljer. Syftet med spelet är att du rör på dig under din tid i vården. Det är viktigt för ditt tillfrisknande att du inte ligger stilla på sängen under din vistelse på sjukhuset. Det är viktigt att du är aktiv, rör på dig efter förmåga och medverkar i din vård.
                    </p>
                </div>
                <div class="carousel-item" id="2">
                    <div class="row justify-content-end">
                        <div class="col col-md-3">
                            <div class="text-right">
                                <a href="#" data-toggle="popover" data-trigger="focus" title="Instruktioner!" data-content="Här finns det instruktioner om hur du kan spela Walk The Ward. Använd gärna Tillbaka knappen om du vill gå tillbaka och läsa igen syftet med spelet. Annars kan du klicka på Fortsätt knapp när du läst och förstått instruktionerna och gå vidare. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md">
                            <h1 class="text-center"><strong>Instruktioner</strong></h1>
                        </div>
                    </div>
                    <p>För att starta en spelomgång börjar du med att välja en del av Skåne du vill vandra i. Skåne är indelat i 5 olika delar där du går från stad till stad inom det valda området. Efter detta väljer du ett av de teman som finns att svara frågor på. Därefter kommer du till en sida där du använder dig av kameran på surfplattan eller telefonen för att skanna en QR-kod och då få fram en fråga att svara på.</p>
                </div>

                <div class="carousel-item" id="3">
                    <div class="row justify-content-end">
                        <div class="col col-md-3">
                            <div class="text-right">
                                <a href="#" data-toggle="popover" data-trigger="focus" title="Instruktioner!" data-content="På den här sidan finns det fler instruktioner om spelet. När du förstår instruktionerna och är redo att börja spela då kan du klicka på knappen Spela! " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <h1 class="text-center"><strong>Instruktioner</strong></h1>
                    </div>
                    <p>Du får fyra svarsalternativ till varje fråga. Svarar du inte rätt den första gången får du försöka tills du väljer rätt svar. Börja med att leta upp en station. Stationen innehåller en svart och vit QR-kod som du skannar genom att hålla upp kameran på din surfplatta eller telefon mot koden. Koderna finns uppsatta i korridoren på avdelningen. Du får spela när du vill och hur länge du vill under tiden som du ligger inlagd.</p>
                    <p>Behöver du hjälp under spelets gång, tryck på det orangea frågetecknet uppe i högra hörnet för mer instruktioner.</p>
                </div>
            </div>

            <!-- Buttons -->
            <a class="carousel-control-prev carousel-hide-button" href="#info-carousel" role="button" data-slide="prev">
                <button class="btn-fear btn-medium">Tillbaka</button>
            </a>

            <a class="carousel-control-next" href="#info-carousel" role="button" data-slide="next">
                <button class="btn-trust btn-medium">Fortsätt</button>
            </a>

            <a class="info-play carousel-hide-button" href="{{url('/')}}/map" role="button">
                <button class="btn-joy btn-big info-playbutton start-loader">Spela</button>
                <a/>

            </div>
        </div>
    </div>
</div>
@endsection



@section('body-script')
    <!-- Slide button class controls -->
    <script type="text/javascript">
    $(document).ready(function(){
        $('#info-carousel').on('slide.bs.carousel', function (ev) {
            var id = ev.relatedTarget.id;
            switch (id) {
                case "1":
                //Slide 1
                $('a.carousel-control-prev').addClass('carousel-hide-button');
                $('a.info-play').addClass('carousel-hide-button');
                $('a.carousel-control-next').removeClass('carousel-hide-button');
                break;
                case "2":
                // Slide 2
                $('a.carousel-control-prev').removeClass('carousel-hide-button');
                $('a.carousel-control-next').removeClass('carousel-hide-button');
                $('a.info-play').addClass('carousel-hide-button');
                break;
                case "3":
                // Slide 3
                $('a.carousel-control-prev').removeClass('carousel-hide-button');
                $('a.carousel-control-next').addClass('carousel-hide-button');
                $('a.info-play').removeClass('carousel-hide-button');
                break;
                default:
                //the id is none of the above
                alert("There was an error!");
            }
        });
    });
    </script>
@endsection
