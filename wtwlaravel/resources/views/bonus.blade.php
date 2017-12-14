@extends('layouts.app')

@section('title', 'Bonus')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-bonus.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-3">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Bonus fråga!" data-content="Den här är en bonus fråga. Tryck på bokstäverna för att gissa var du är! Om du vill inte svara på bonus frågan kan du trycka på “Hoppa över” knappen. " style="white-space:nowrap;">
                        <img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark">
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col">
                <div class="text-center puzzle" style="background-image:url('{{url('/')}}/images/bonus/{{$bonusGameImageSource}}');">
                    @php
                    $count = 1;
                    foreach( $bonusGameLettersArray as $letter ){
                        if ($count%4 == 1)
                        {
                            echo "<div class='row no-gutters puzzle-row justify-content-around'>";
                        }
                        echo "<div class='col-3 puzzle-piece'>
                        <div>
                        <p class='imageLetters'>$letter</p>
                        </div>
                        </div>";
                        if ($count%4 == 0)
                        {
                            echo "</div>";
                        }
                        $count++;
                    }
                    @endphp
                </div>
            </div>

            <div class="col">
                <h2 id="bonus-word" class="text-center">
                    @php
                    $count = 0;
                    foreach($bonusGameLettersShuffledRestArray as $restLetter){
                        echo "<span class='fullPlaceName' id='guessChar$count'>$restLetter</span>";
                        $count++;
                    }
                    @endphp
                    {{-- <span class="letter-m">_</span><span class="letter-a">_</span><span class="letter-l">_</span><span class="letter-m">_</span><span class="letter-ö">Ö</span> --}}
                </h2>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col text-right">
                <a href="{{url('/')}}{{$bonusUrl}}" class="btn-trust btn-medium"><span id="btnNext">Hoppa över</span></a>
            </div>
        </div>
    </div>

    <input id="bonusGameLetters" type="hidden" name="bonusGameLetters" value="{{$bonusGameLetters}}">
@endsection



@section('body-script')
    <script type="text/javascript">
    $(document).ready(function(e) {
        var $res = 0;
        var $bonusGameLetters = $('#bonusGameLetters').val();
        $('.puzzle-piece').on('click', function(event) {
            event.preventDefault();
            $(this).addClass('hidden-piece');
            $(this).children("div").children("p").hide();
            console.log($(this).children("div").children("p") + "hela objektet");
            console.log($(this).children("div").children("p")[0].innerText + "bokstaven");
            var $bonusGameLettersIndexOf = $bonusGameLetters.indexOf($(this).children("div").children("p")[0].innerText);
            var char = $(this).children("div").children("p")[0].innerText;
            console.log($bonusGameLettersIndexOf + "index av bokstaven igen");
            console.log(char + "what is char");
            console.log($bonusGameLetters.indexOf(char));
            var $bonusWord = $('#bonus-word')[0].innerText;
            console.log($bonusWord);

            if($bonusGameLetters.indexOf(char) !== -1) {
                for (var i=0; i < $bonusGameLetters.length; i++){
                    if ($bonusGameLetters.charAt(i) === char){
                        console.log("guessChar innerHTML: " + $('#guessChar' + i).innerHTML);
                        $('#guessChar' + i).html(char);
                        $res++;
                        $bonusWord = $('#bonus-word')[0].innerText;
                        console.log("res" + $res + ", length:" + $bonusGameLetters.length);
                        // if ($bonusGameLetters.localeCompare($bonusWord) == 0) {
                        console.log("$bonusWord: "+ $bonusWord);
                        console.log("$bonusGameLetters: "+$bonusGameLetters);
                        if ($bonusGameLetters === $bonusWord) {
                            console.log("success");

                            $('.puzzle-piece').addClass('hidden-piece');
                            $('.puzzle-piece').children("div").children("p").hide();
                            $("#btnNext").html("Fortsätt spela");
                        }
                    }
                }
            }
        });
    });
    </script>
@endsection
