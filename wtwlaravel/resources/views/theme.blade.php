@extends('layouts.app1')

@section('title', 'Tema')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-theme.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Välj ett tema!" data-content="På den här sidan väljer du ett tema genom att klicka på det som du gillar mest! " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 id="themehead"align="center">Välj ett tema</h1>
            </div>
        </div>
        <div class="row justify-content-start">
            @php
            $count = 1
            @endphp
            @foreach ($theme as $t)
                <div class="col-md-6 col-theme">
                    <button class="button-theme theme-color-{{$count++}} start-loader" data-theme-id="{{ $t->id }}">
                        <h2 class="align-center theme-button-text-adjust">
                            <div id="themehead_bold">
                                <img src="./images/circle2.png" alt="icon" width="70px" height="auto">
                                {{ $t->name }}
                            </div>
                        </h2>
                    </button>
                </div>
                @php
                if ($count == 7) {
                    $count = 1;
                }
                @endphp
            @endforeach
            {{-- <div class="col-md-6">
            <h2 align="center"><img src="./images/circle.png" alt="icon" width="70px" height="auto"> Trädgård</h2>
        </div> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{-- @foreach ($theme as $t)
            <button class="button button-theme" data-theme-id="{{ $t->id }}">
            {{ $t->name }}
        </button>
    @endforeach
    theme --}}
</div>
<div class="col-md-6"></div>
</div>
</div>
<input id="gameId" type="hidden" name="gameId" value="{{$gameId}}">
@endsection



@section('body-script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('.button-theme').click(function(){
            var themeId = $(this).attr("data-theme-id");
            console.log(themeId);
            var gameId = $('#gameId').val();
            console.log(gameId);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('/')}}/theme/store",
                data: {themeId: themeId, gameId: gameId},
                dataType: 'json',
                success: function(data) { // Om det LYCKADES att spara data
                    console.log(data);
                    window.location.href = "{{url('/')}}/scan";

                }, // SLUT - Om det LYCKADES att spara data
                error: function(xhr, textStatus, errorThrown,) { // Om det MISSLYCKADES att spara data
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            }); // SLUT - Om det MISSLYCKADES att spara data
        });
    });
    </script>
@endsection
