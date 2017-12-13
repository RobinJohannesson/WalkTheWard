@extends('layouts.app1')

@section('title', 'Admin')

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
                <h1 class="text-center">Admin</h1>

                    <div class="form-group">
                        <a href="{{url('/')}}/admin/newQuestion" class="btn-fear btn-medium return_button start-loader">Lägg till ny fråga</a>
                        <a href="{{url('/')}}/admin/adjustTheme" class="btn-fear btn-medium return_button start-loader">Justera teman</a>
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{url('/')}}/gameHome" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
                        </div>
                    </div>

            </div>
            <div class="col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Administration" data-content="Administration görs endast av personal!" style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
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
