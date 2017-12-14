@extends('layouts.app')

@section('title', 'Statistik')

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
