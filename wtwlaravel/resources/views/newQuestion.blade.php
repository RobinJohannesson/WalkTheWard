@extends('layouts.app')

@section('title', 'Ny fråga')

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

                <h1 class="text-center">Ny fråga</h1>

                <form action="{{{ url("admin/newQuestion") }}}" id="newQuestionForm" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="text-input-newQuestion" class="col-form-label newQuestion">Frågan</label>
                        <textarea class="form-control newQuestion" maxlength="180" rows="4" cols="50" required id="text-input-newQuestion" name="newQuestion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionFirstAlternative" class="col-form-label newQuestionFirstAlternative">Alternativ 1</label>
                        <textarea class="form-control newQuestionFirstAlternative" maxlength="180" rows="2" cols="50" required id="text-input-newQuestionFirstAlternative" name="newQuestionFirstAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionSecondAlternative" class="col-form-label newQuestionSecondAlternative">Alternativ 2</label>
                        <textarea class="form-control newQuestionSecondAlternative" maxlength="180" rows="2" cols="50" required id="text-input-newQuestionSecondAlternative" name="newQuestionSecondAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionThirdAlternative" class="col-form-label newQuestionThirdAlternative">Alternativ 3</label>
                        <textarea class="form-control newQuestionThirdAlternative" maxlength="180" rows="2" cols="50" required id="text-input-newQuestionThirdAlternative" name="newQuestionThirdAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionForthAlternative" class="col-form-label newQuestionForthAlternative">Alternativ 4</label>
                        <textarea class="form-control newQuestionForthAlternative" maxlength="180" rows="2" cols="50" required id="text-input-newQuestionForthAlternative" name="newQuestionForthAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <p>Vilket alternativ är rätt svar på frågan?</p>
                        <select name="newQuestionRightAlternative" required>
                            <option value="1">Alternativ 1</option>
                            <option value="2">Alternativ 2</option>
                            <option value="3">Alternativ 3</option>
                            <option value="4">Alternativ 4</option>
                        </select>
                    </div>




                    <div class="form-group">
                        <p>Välj val av media (bild eller video) tilhörande frågan</p>
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




                    <div class="form-group">
                        <p>Vilket tema tillhör frågan?</p>
                        <select name="newQuestionTheme" id="newQuestionTheme" required>
                            @foreach ($themes as $t)
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                            <option value="0">Skapa nytt tema</option>
                        </select>
                    </div>
                    <div class="form-group" id="newThemeDisplay">
                        <label for="text-input-newQuestionNewTheme" class="col-form-label newQuestionNewTheme">Namn för nytt tema</label>
                        <textarea class="form-control newQuestionNewTheme" maxlength="180" rows="4" cols="50" id="text-input-newQuestionNewTheme" name="newQuestionNewTheme"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{url('/')}}/admin" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
                        </div>
                        <div class="col-6 text-right">
                            <input type="submit" id="submit_button" class="btn-trust btn-medium" value="Skapa fråga">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Skapa fråga" data-content="Här skapar administratörer en ny fråga." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>

    </div>
@endsection



@section('body-script')
    <script type="text/javascript">
    $('#newThemeDisplay').hide();
    $(document).ready(function(){
        $('#newQuestionForm').change(function() {
            if ($('#newQuestionTheme').val() == "0") {
                $('#newThemeDisplay').show();
                $('#text-input-newQuestionNewTheme').attr('required', '');
            } else {
                $('#newThemeDisplay').hide();
                $('#text-input-newQuestionNewTheme').removeAttr('required');
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
