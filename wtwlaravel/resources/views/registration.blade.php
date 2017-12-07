@extends('layouts.app')

@section('title', 'Registrera')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-registration.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-8 order-2 order-md-1">
                <div id="registration">


                    <form action="{{{ url("registration/store") }}}" method="POST" id="registrationForm">
                        {{ csrf_field() }}
                        <h1 align="center">Registrering</h1>
                        <div class="row no-gutters">
                            <div class="col-sm-8">


                                <div class="row no-gutters">
                                    <div class="col-sm-8">
                                        <p>Ålder: </p>
                                        <input type="number" name="age" style="border: 1px solid; border-radius: 5px;" required>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-sm-12">
                                        <br>
                                        <p>Kön:</p>
                                        <label class="radio-inline"><input type="radio" name="gender" value="Kvinna" required class="big-radio-btn">Kvinna<br></label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="Man" required class="big-radio-btn">Man<br></label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="Annat" required class="big-radio-btn"> Annat<br></label>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-sm-12">
                                        <br>
                                        <p>Typ av rum:</p>
                                        <label class="radio-inline"><input type="radio" name="roomType" value="1" required class="big-radio-btn"> singelrum<br></label>
                                        <label class="radio-inline"><input type="radio" name="roomType" value="2" required class="big-radio-btn">dubbelrum<br></label><br>
                                    </div>
                                </div>

                                <input id="characterId" type="hidden" name="characterId" value="7">

                            </div>
                            <div class="col-sm-4 text-center">
                                <img class="choosenCharacterImage" data-character-id="7" src="{{url('/')}}/images/characters/bigpete.gif" alt="En vanlig karaktär">
                                <a href="#" class="btn-interest btn-small text-center" data-toggle="modal" data-target="#characterModal" id="openCharacterModal">Välj karaktär</a>
                            </div>

                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-12 text-right">
                                <input type="submit" id="submit_button" class="btn-trust btn-medium" value="Registrera">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Registrera dig" data-content="Skriv in din ålder, kön och vilket typ av rum du bor i under din vistelse." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="characterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-custom-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-center" id="characterModalTitle">
                        Välj en karaktär som du gillar
                    </h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class='row no-gutters justify-content-around text-center'>

                                @if ($characters)
                                    @foreach ($characters as $c)

                                        <div class="col">
                                            <img class="characterImage" data-character-id="{{$c->id}}" src="{{url('/')}}/images/characters/{{$c->imageSource}}" alt="{{$c->name}}">
                                        </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-left">
                    <div class="col text-left">
                        <a href="" type="button" class="btn btn-secondary btn-back return_button" data-dismiss="modal">Tillbaka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('body-script')
    <script type="text/javascript">

    $(document).ready(function(){

        $("form").submit(function() {
            startLoader();
        });

        $(".choosenCharacterImage").on("click", function (e) {
            $('#characterModal').modal('show');
        });

        $(".characterImage").click(function(event) {
            $(".characterImage").removeClass('selectedImage');
            $(this).addClass('selectedImage');
            var characterId = $(this).attr('data-character-id');
            $("#characterId").val(characterId);
            var characterImageSrc = $(this).attr('src');
            $(".choosenCharacterImage").attr('src', characterImageSrc);
            $(".choosenCharacterImage").attr('data-character-id', characterId);
            $('#characterModal').modal('hide');

        });

        // $("#characterRegistration").on("click", function (e) {
        //
        //     if ($("#registrationForm")[0].checkValidity()){
        //         $("#registrationForm").submit();
        //         e.preventDefault();
        //     }
        //     else {
        //         console.log("Something is Required!");
        //     }
        // });

        // $('#characterRegistration').click(function(event) {
        //     var charId = $(".isSelected").attr("data-character-id");
        // });
    });
    </script>
@endsection
