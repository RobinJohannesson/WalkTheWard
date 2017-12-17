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
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-8 order-2 order-md-1">
                <h1 class="text-center">Radera fråga</h1>
                <form action="{{{ url("admin/deleteQuestion") }}}" id="deleteQuestionForm" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <p>Teman</p>
                        <select id="selected-theme" name='chooseTheme' required>
                            <option value='' disabled>Välj ett tema</option>
                            @foreach ($themes as $t)
                                <option id='choosePlace{{$t->id}}' value='{{$t->id}}'>{{$t->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (isset($questions))
                        <div class="form-group">
                            <div class="" id="questions-holder">
                                @foreach ($questions as $q)
                                    <input type='checkbox' class="big-checkbox" id='deleteQuestion{{$q->id}}' name='{{$q->id}}'>
                                    <label for='deleteQuestion{{$q->id}}' class='col-form-label'>
                                        {{$q->question}}
                                    </label>
                                    <br />
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{url('/')}}/admin" class="btn-fear btn-medium return_button start-loader">Tillbaka</a>
                        </div>
                        <div class="col-6 text-right send-btn" style="display:none;">
                            <input type="submit" id="submit_button" class="btn-trust btn-medium" value="Radera valda frågor">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-2 order-1 order-md-2">
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
        $('#selected-theme').change(function() {

            event.preventDefault();
            var themeId = $('#selected-theme').val();
            console.log(themeId);
            startLoader();
            $.ajax({
                type: "GET",
                async: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{url('/')}}/admin/deleteQuestion/getQuestions",
                data: {themeId: themeId},
                // dataType: 'json',
                success: function(data) { // Om det LYCKADES
                    console.log(data);
                    // console.log(data['questions']);

                    // Visa frågorna så man kan välja vilka man ska ta bort...

                    stopLoader();

                }, // SLUT - Om det LYCKADES
                error: function(xhr, textStatus, errorThrown) { // Om det MISSLYCKADES
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(errorThrown);
                    stopLoader();
                }
            }); // SLUT - Om det MISSLYCKADES

            // return false;
        });


        $("form").submit(function() {
            startLoader();
        });
    });
    </script>

@endsection
