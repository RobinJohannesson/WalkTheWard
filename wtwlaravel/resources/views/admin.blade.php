@extends('layouts.app')

@section('title', 'Admin')

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

                <h1 class="text-center">Administration</h1>

                <div class="row">
                    <div class="col">
                        @if (session('statusMessage') && session('statusMessage') != "")
                            @if (session('statusCode') && session('statusCode') == "1" )
                                <h3 class="status-message text-center bg-success text-white">{{session('statusMessage')}}</h3>
                            @else
                                <h3 class="status-message text-center bg-danger text-white">{{session('statusMessage')}}</h3>
                            @endif
                        @endif

                    </div>
                </div>


                <div class="form-group">
                    <a href="{{url('/')}}/admin/newQuestion" class="btn-admin btn-trust btn-medium start-loader">Lägg till ny fråga</a>
                    <a href="{{url('/')}}/admin/deleteQuestion" class="btn-admin btn-trust btn-medium start-loader">Ta bort frågor</a><br>
                    <a href="{{url('/')}}/admin/adjustTheme" class="btn-admin btn-trust btn-medium start-loader">Skapa och hantera teman</a><br>
                    <a href="{{url('/')}}/admin/adjustBonus" class="btn-admin btn-trust btn-medium start-loader">Skapa och hantera bonusfrågorna</a><br>
                    <a href="{{url('/')}}/admin/adjustExercise" class="btn-admin btn-trust btn-medium start-loader">Skapa och hantera rörelsevideorna</a><br>
                    <a href="{{url('/')}}/admin/showStatistics" class="btn-admin btn-trust btn-medium start-loader">Visa statistik</a>
                </div>


            </div>
            <div class="col-md-2 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Administration" data-content="Administration görs endast av personal!" style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 text-left">
                {{-- <a href="{{url('/')}}/gameHome" class="btn-fear btn-medium return_button start-loader">Tillbaka</a> --}}
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-fear btn-medium start-loader">
                    Logga ut
                    <strong>
                        {{ Auth::user()->name }}
                    </strong>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
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
