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
                <form action="{{{ url("statistics/store") }}}" id="statisticsForm" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <p>Ska du hem idag?</p>
                        <label class="radio-inline"><input type="radio" name="hasGoneHome" value="1" class="big-radio-btn" required> Ja<br></label>
                        <label class="radio-inline"><input type="radio" name="hasGoneHome" value="0" class="big-radio-btn" required> Nej<br></label>
                    </div>

                    <div class="form-group">
                        <p>Hur många dagar har du varit inlagd?</p>
                        <select number="5" name="dayAmount" required>
                            <option disabled value="">Välj antal dagar</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p>Var spelet enkelt att spela?</p>
                        <label class="radio-inline"><input class="wasEasyToPlayRadio big-radio-btn" type="radio" name="wasEasyToPlay" value="1" required> Ja<br></label>
                        <label class="radio-inline"><input class="wasEasyToPlayRadio big-radio-btn" type="radio" name="wasEasyToPlay" value="0" required> Nej<br></label>
                        <br>
                        <label for="text-input" class="col-form-label statisticsWhy">Förklara varför:</label>
                        <textarea class="form-control statisticsWhy" maxlength="180" rows="4" cols="50" id="text-input" name="explainWhy"></textarea>
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
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Svara på frågorna!" data-content="På den här sidan svarar du på frågorna och sedan trycker på knappen “Skicka”. " style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
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

        $("form").submit(function() {
            startLoader();
        });
    });
    </script>

@endsection
