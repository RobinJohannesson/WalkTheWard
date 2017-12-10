@extends('layouts.app')

@section('title', 'justera teman')

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
                <h1 class="text-center">Justera teman</h1>
                <form action="{{{ url("admin/adjustTheme") }}}" id="newThemeForm" method="POST" style="font-size: 24pt"; width: 500px;>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <span>
                            Vill du skapa nytt tema?
                        </span>
                        <input type="radio" class="ifNewTheme" id="ifNewThemeYes" name="ifNewTheme" value="yes">Ja
                        <input type="radio" class="ifNewTheme" name="ifNewTheme" value="no">Nej
                    </div>
                    <div class="form-group newThemeDisplay">
                        <label for="text-input" class="col-form-label newTheme">Namn för nytt tema</label>
                        <textarea class="form-control newTheme" maxlength="180" rows="4" cols="50" id="text-input" name="newTheme"></textarea>
                    </div>
                    <div class="form-group newThemeDisplay">
                        <span>
                            Ska ditt nya tema vara aktivt?
                        </span>
                        <input type="radio" name="ifNewThemeActive" value="1">Ja
                        <input type="radio" name="ifNewThemeActive" value="0">Nej
                    </div>
                    <div class="form-group">
                        <p>Aktivera/Inaktivera valda tema</p>
                            @foreach ($theme as $t)
                                @php
                                if ($t->isActive == 0) {
                                    echo "<input type='checkbox' id='activateTheme$t->id' class='isActiveTheme$t->isActive checkboxForThemes' name='$t->id' value='unchecked'>
                                    <label for='activateTheme$t->id' class='col-form-label'>$t->name</label>";
                                }
                                if ($t->isActive == 1) {
                                    echo "<input type='checkbox' id='activateTheme$t->id' class='isActiveTheme$t->isActive checkboxForThemes' name='$t->id' value='checked' checked>
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
    $('.newThemeDisplay').hide();
    $(document).ready(function(){
        $('.ifNewTheme').change(function() {
        if ($('#ifNewThemeYes').prop('checked')) {
            $('.newThemeDisplay').show();
        } else {
            $('.newThemeDisplay').hide();
        }
        });
        $("form").submit(function() {
            startLoader();
        });
    });
    </script>

@endsection
