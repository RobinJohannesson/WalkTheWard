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
            <div class="col col-md-3">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Svara på frågorna!" data-content="På den här sidan svarar du på frågorna och sedan trycker på knappen “Skicka”. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Statistik</h1>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="{{{ url("statistics/store") }}}" id="statisticsForm" method="POST" style="font-size: 24pt"; width: 500px;>
                    {{ csrf_field() }}
                    <p>Ska du gå hem?</p>
                    <label class="radio-inline"><input type="radio" name="hasGoneHome" value="1"> Ja<br></label>
                    <label class="radio-inline"><input type="radio" name="hasGoneHome" value="0"> Nej<br></label>
                    <p>Hur många dagar har du varit inlagd?</p>
                    <select number="5" name="dayAmount">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <p>Var spelet enkelt att spela?</p>
                    <label class="radio-inline"><input class="wasEasyToPlayRadio" type="radio" name="wasEasyToPlay" value="1"> Ja<br></label>
                    <label class="radio-inline"><input class="wasEasyToPlayRadio" type="radio" name="wasEasyToPlay" value="0"> Nej<br></label>
                    <div class="form-group row">
                        <label for="text-input" class="col-form-label statisticsWhy">Förklara varför:</label>
                        <input class="form-control statisticsWhy" type="text" id="text-input" name="explainWhy">
                    </div>
                    <a href="{{url('/')}}/home" type="button" class="button continue_button">Tillbaka</a>
                    <input type="submit" id="submit_button" class="btn-primary" value="Skicka">
                </form>

            </div>
        </div>
    </div>
@endsection



@section('body-script')
    <script type="text/javascript">
    // $('.statisticsWhy').hide();
    $(document).ready(function(){
        // $('#statisticsForm').change(function() {
        // if ($('.wasEasyToPlayRadio').prop('checked')) {
        //     $('.statisticsWhy').show();
        // } else {
        //     $('.statisticsWhy').hide();
        // }
        // });
    });
    </script>
@endsection
