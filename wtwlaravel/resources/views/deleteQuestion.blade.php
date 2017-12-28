@extends('layouts.app')

@section('title', 'Radera fråga')

@section('meta')

@endsection

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-admin.css">
@endsection

@section('head-script')

@endsection



@section('body')
    <div class="container-fluid p-0">
        <div class="row justify-content-end no-gutters">
            <div class="col-md-10 order-2 order-md-1">
                <h1 class="text-center">Radera/ändra fråga</h1>
                <form action="{{{ url("admin/deleteQuestion/getQuestions") }}}" id="getQuestionsForm" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for='selected-theme' class='col-form-label'>Teman</label>
                        <br>
                        <select id="selected-theme" name='themeId' required>
                            <option disabled {{!isset($selectedThemeId) ? 'selected':''}}>Välj ett tema</option>
                            @foreach ($themes as $t)
                                <option id='choosePlace{{$t->id}}' value='{{$t->id}}' {{(isset($selectedThemeId) && $selectedThemeId == $t->id)?'selected':''}}>{{$t->name}}{{$t->isActive == 0 ? "(inaktivt)" : ""}}</option>
                            @endforeach
                        </select>
                    </div>

                </form>
                @if (isset($questions) && count($questions))
                    <form action="{{{ url("admin/deleteQuestion/deleteQuestions") }}}" id="getQuestionsForm" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h4 style="margin: 50px 0 30px 0">
                                Markera de frågor som du vill radera
                            </h4>
                            <div class="" id="questions-holder">
                                @foreach ($questions as $q)
                                    <div class="row no-gutters" style="border-bottom: 4px dotted black; padding: 10px 0;">
                                        <div class="col-md-1">
                                            <input type='checkbox' class="big-checkbox" id='deleteQuestion{{$q->id}}' name='{{$q->id}}'>
                                        </div>
                                        <div class="col-md-9">
                                            <label for='deleteQuestion{{$q->id}}' class='col-form-label'>
                                                {{$q->question}}
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{url('/')}}/admin/updateQuestion/{{$q->id}}" class="btn-small btn-trust start-loader">Ändra <i class="material-icons">mode_edit</i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endif

                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{url('/')}}/admin" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
                        </div>
                        @if (isset($questions) && count($questions))
                            <div class="col-6 text-right send-btn">
                                <input type="submit" id="submit_button" class="btn-trust btn-medium" value="Radera valda frågor">
                            </div>
                        </form>
                    @endif
                </div>


            </div>
            <div class="col-md-1 order-1 order-md-2">
                <div class="text-right">
                    <a href="#" data-toggle="popover" data-trigger="focus" title="Radera frågor" data-content="På den här sidan kan administratörer radera frågor." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
                </div>
            </div>
        </div>

    </div>
@endsection



@section('body-script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#selected-theme').change(function(e) {
            e.preventDefault();

            if ($("#getQuestionsForm")[0].checkValidity()){
                $("#getQuestionsForm").submit();
                e.preventDefault();
            }
            else {
                console.log("Something is Required!");
                stopLoader();
            }

        });


        $("form").submit(function() {
            startLoader();
        });
    });
    </script>

@endsection
