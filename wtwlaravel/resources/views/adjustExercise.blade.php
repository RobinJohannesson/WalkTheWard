@extends('layouts.app')

@section('title', 'Hantera rörelse')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-admin.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-8 order-2 order-md-1">
                <h1 class="text-center">Justera teman</h1>
                <form action="{{{ url("admin/adjustExercise") }}}" id="newExerciseForm" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <span>
                            Vill du skapa ny dagens rörelse?
                        </span>
                        <input type="radio" class="ifNewExercise" id="ifNewExerciseYes" name="ifNewExercise" value="yes">Ja
                        <input type="radio" class="ifNewExercise" name="ifNewExercise" value="no">Nej
                    </div>
                    <div class="form-group newExerciseDisplay">
                        <p>Välj val av media (bild eller video) tilhörande rörelsen</p>
                        {{-- <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*"> --}}
                        {{-- <input type="submit" value="Upload Image" name="submit"> --}}
                        <div class="text-center">

                            <img id="image-preview" src="#" alt="Bild kunde inte förhandsgranskas!" style="display: none;"/>
                            <video id="video-preview" controls poster="" alt="Video kunde inte förhandsgranskas!" style="display: none;">
                                <source src="" id="video-preview-src" />
                                Your browser does not support HTML5 video.
                            </video>

                        </div>
                        <label class="custom-file">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input" accept=".gif, .jpg, .jpeg, .png, .mp4">
                            <span class="custom-file-control"></span>
                        </label>
                        <span class="allowed-types">Tillåtna filformat: <strong>.png .gif .jpg .jpeg .mp4</strong></span>

                    </div>
                    <div class="form-group newExerciseDisplay">
                        <span>
                            Ska den nya rörelsen vara aktiv?
                        </span>
                        <input type="radio" name="ifNewExerciseActive" value="1">Ja
                        <input type="radio" name="ifNewExerciseActive" value="0">Nej
                    </div>
                    <div class="form-group">
                        <p>Aktivera (<input type='checkbox' class='instruction-checkbox' checked disabled>) / Inaktivera (<input type='checkbox' class='instruction-checkbox' disabled>) valda rörelser</p>
                        @foreach ($exercise as $e)
                            <label for='activateExercise{{$e->id}}' class='col-form-label'>
                                <input type='checkbox' id='activateExercise{{$e->id}}' class='isActiveExercise{{$e->isActive}} checkboxForExercises big-checkbox' name='{{$e->id}}' value='1' {{$e->isActive == 1 ? "checked" : ""}}>
                                {{$e->videoSource}}
                            </label>
                            <br />
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{url('/')}}/gameHome" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
                        </div>
                        <div class="col-6 text-right">
                            <input type="submit" id="submit_button" class="btn-trust btn-medium" value="Skicka">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Skapa och justera teman" data-content="På den här sidan kan administratörer skapa och justera teman." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>

    </div>
@endsection



@section('body-script')
    <script type="text/javascript">
    $('.newExerciseDisplay').hide();
    $(document).ready(function(){
        $('.ifNewExercise').change(function() {
            if ($('#ifNewExerciseYes').prop('checked')) {
                $('.newExerciseDisplay').show();
                $('#text-input-newQuestionNewExercise').attr('required', '');
            } else {
                $('.newExerciseDisplay').hide();
                $('#text-input-newQuestionNewExercise').removeAttr('required');
            }
        });
        $("form").submit(function() {
            // Clear video from memory.
            URL.revokeObjectURL(('#video-preview-src')[0].src);

            startLoader();
        });

        $('input[type=file]').change(function(e) {

            $('#image-preview').hide();
            $('#video-preview').hide();

            if (!e.target.files || e.target.files.length === 0 || !window.FileReader) {
                $('<style>.custom-file-control:lang(sv-se):empty::after{content:"Ingen fil har valts"}</style>').appendTo('head');
                return;
            }



            if (e.target.files[0].type.split('/')[0] == 'image') {
                console.log(e.target.files[0].type.split('/')[0]);

                var fileName = e.target.files[0].name;
                $('<style>.custom-file-control:lang(sv-se):empty::after{content:"'+fileName+'"}</style>').appendTo('head');

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(e.target.files[0]);

                $('#image-preview').show('1000', 'linear');



            }
            else if (e.target.files[0].type.split('/')[0] == 'video') {
                console.log(e.target.files[0].type.split('/')[0]);

                var fileName = e.target.files[0].name;
                $('<style>.custom-file-control:lang(sv-se):empty::after{content:"'+fileName+'"}</style>').appendTo('head');

                var $source = $('#video-preview-src');
                $source[0].src = URL.createObjectURL(e.target.files[0]);
                $source.parent()[0].load();

                $('#video-preview').show('1000', 'linear');
            }
            else {

            }

        });
        // $('.custom-file-control:lang(sv-se):empty::after');


    });
    </script>

@endsection
