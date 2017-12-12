@extends('layouts.app')

@section('title', 'Ny fråga')

@section('meta')

@endsection

@section('head-stylesheet')

@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-8 order-2 order-md-1">

                <h1 class="text-center">Ny fråga</h1>

                @if (isset($statusMessage) && $statusMessage != "")
                    <h3 class="text-center bg-info text-white">{{$statusMessage}}</h3>
                @endif

                @if (isset($Question) && $Question != null)
                    <h3 class="text-center bg-info text-white">{{$Question->imageSource}}</h3>
                @endif

                <form action="{{{ url("admin/newQuestion") }}}" id="newQuestionForm" method="POST" style="font-size: 24pt; width: 500px;" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="text-input-newQuestion" class="col-form-label newQuestion">Frågan</label>
                        <textarea class="form-control newQuestion" maxlength="180" rows="4" cols="50" required id="text-input-newQuestion" name="newQuestion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionFirstAlternative" class="col-form-label newQuestionFirstAlternative">Alternativ 1</label>
                        <textarea class="form-control newQuestionFirstAlternative" maxlength="180" rows="4" cols="50" required id="text-input-newQuestionFirstAlternative" name="newQuestionFirstAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionSecondAlternative" class="col-form-label newQuestionSecondAlternative">Alternativ 2</label>
                        <textarea class="form-control newQuestionSecondAlternative" maxlength="180" rows="4" cols="50" required id="text-input-newQuestionSecondAlternative" name="newQuestionSecondAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionThirdAlternative" class="col-form-label newQuestionThirdAlternative">Alternativ 3</label>
                        <textarea class="form-control newQuestionThirdAlternative" maxlength="180" rows="4" cols="50" required id="text-input-newQuestionThirdAlternative" name="newQuestionThirdAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input-newQuestionForthAlternative" class="col-form-label newQuestionForthAlternative">Alternativ 4</label>
                        <textarea class="form-control newQuestionForthAlternative" maxlength="180" rows="4" cols="50" required id="text-input-newQuestionForthAlternative" name="newQuestionForthAlternative"></textarea>
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
                        <p>Tillåtna filformat: png, gif, jpg, mp4</p>
                        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                        {{-- <input type="submit" value="Upload Image" name="submit"> --}}
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
                            <a href="{{url('/')}}/home" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
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
            startLoader();
        });


    });
    </script>

@endsection
