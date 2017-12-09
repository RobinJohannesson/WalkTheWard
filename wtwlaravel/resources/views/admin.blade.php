@extends('layouts.app')

@section('title', 'Avsluta')

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
                <h1 class="text-center">Statistik</h1>
                <form action="{{{ url("admin/store") }}}" id="newQuestionForm" method="POST" style="font-size: 24pt"; width: 500px;>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="text-input" class="col-form-label newQuestion">Frågan</label>
                        <textarea class="form-control newQuestion" maxlength="180" rows="4" cols="50" id="text-input" name="newQuestion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input" class="col-form-label newQuestionFirstAlternative">Alternativ 1</label>
                        <textarea class="form-control newQuestionFirstAlternative" maxlength="180" rows="4" cols="50" id="text-input" name="newQuestionFirstAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input" class="col-form-label newQuestionSecondAlternative">Alternativ 2</label>
                        <textarea class="form-control newQuestionSecondAlternative" maxlength="180" rows="4" cols="50" id="text-input" name="newQuestionSecondAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input" class="col-form-label newQuestionThirdAlternative">Alternativ 3</label>
                        <textarea class="form-control newQuestionThirdAlternative" maxlength="180" rows="4" cols="50" id="text-input" name="newQuestionThirdAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text-input" class="col-form-label newQuestionForthAlternative">Alternativ 4</label>
                        <textarea class="form-control newQuestionForthAlternative" maxlength="180" rows="4" cols="50" id="text-input" name="newQuestionForthAlternative"></textarea>
                    </div>
                    <div class="form-group">
                        <p>Vilket alternativ är rätt svar på frågan?</p>
                        <select number="5" name="newQuestionRightAlternative" required>
                            <option value="1">Alternativ 1</option>
                            <option value="2">Alternativ 2</option>
                            <option value="3">Alternativ 3</option>
                            <option value="4">Alternativ 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Välj val av media tilhörande frågan</p>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </div>
                    <div class="form-group">
                        <p>Vilket tema tillhör frågan?</p>
                        <select number="5" name="newQuestionTheme" required>
                            <option value="0">Skapa nytt tema</option>
                            @foreach ($theme as $t)
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text-input" class="col-form-label newQuestionNewTheme">Namn för nytt tema</label>
                        <textarea class="form-control newQuestionNewTheme" maxlength="180" rows="4" cols="50" id="text-input" name="newQuestionNewTheme"></textarea>
                    </div>
                    <div class="form-group">
                        <p>Aktivera/Inaktivera valda tema</p>
                            @foreach ($theme as $t)
                                @php
                                if ($t->isActive == 0) {
                                    echo "<input type='checkbox' id='activateTheme$t->id' class='isActiveTheme$t->isActive'name='$t->name' value='$t->id'>
                                    <label for='activateTheme$t->id' class='col-form-label'>$t->name</label>";
                                }
                                if ($t->isActive == 1) {
                                    echo "<input type='checkbox' id='activateTheme$t->id' class='isActiveTheme$t->isActive'name='$t->name' value='$t->id' checked>
                                    <label for='activateTheme$t->id' class='col-form-label'>$t->name</label>";
                                }
                                @endphp
                            @endforeach
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{url('/')}}/home" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
                        </div>
                        <div class="col-6 text-right">
                            <input type="submit" id="submit_button" class="btn-trust btn-medium" value="Skicka">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Svara på frågorna!" data-content="På den här sidan svarar du på frågorna och sedan trycker på knappen “Skicka”. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
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
    });
    </script>

@endsection
