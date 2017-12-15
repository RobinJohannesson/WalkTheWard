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


            <div class="col-md-12 order-3 order-md-3">

                {{-- FILTERING --}}
                {{-- Visa data från DATE till DATE--}}

                <div class="form-group row">
                    <div class="form-check col-6">
                        <label class="form-check-label">
                            <input class="form-check-input big-radio-btn" type="radio" name="ifFilterRadios" id="ifFilterRadio1" value="0" checked>
                            Visa alla patienter
                        </label>
                    </div>
                    <div class="form-check col-6">
                        <label class="form-check-label">
                            <input class="form-check-input big-radio-btn" type="radio" name="ifFilterRadios" id="ifFilterRadio2" value="1">
                            Filtera patienter med datum när de slutade spela
                        </label>
                    </div>
                </div>

                <div class="form-group row date-input-row" style="display:none;">
                    <div class="col-6">
                        <label for="from-date-input" class="col-form-label date-label">Start datum</label>
                        <input class="form-control" type="date" value="2017-12-01" id="from-date-input">
                    </div>
                    <div class="col-6">
                        <label for="to-date-input" class="col-form-label date-label">Slut datum</label>
                        <input class="form-control" type="date" value="2018-02-01" id="to-date-input">
                    </div>
                    <div class="col-12 text-center">
                        <a href="" id="filter-btn" class="btn-admin btn-trust btn-medium start-loader">Filtrera</a>
                    </div>
                </div>







                {{-- Antal patient som spelat --}}
                {{-- Hur många steg som de har gått --}}
                {{-- Hur många meter som de har gått --}}
                <div class="row">
                    <div class="col">
                        <table class="table table-light table-bordered table-striped table-hover table-sm">
                            <thead class="thead-dark">
                                {{-- <tr>
                                <th>Antal patienter</th>
                                <th>Antal steg</th>
                                <th>Antal meter</th>
                            </tr> --}}
                            <tr>
                                <th scope="col">Patient ID</th>
                                <th scope="col">Kön</th>
                                <th scope="col">Ålder</th>
                                <th scope="col">Typ av rum</th>
                                <th scope="col">Distans promenerat (meter)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patientList as $pl)
                                {{-- @if (in_array($pl->id, (array) $statisticsList["patientId"]))
                                <tr class="moreInfoAboutBtn">
                                @else <tr>
                                @endif --}}
                                <tr>
                                    <td>{{$pl->id}}</td>
                                    <td>{{$pl->gender}}</td>
                                    <td>{{$pl->age}}</td>
                                    <td>{{$pl->roomType}}</td>
                                    <td>{{$pl->distanceInMeter}}</td>
                                </tr>
                                @foreach ($statisticsList as $sl)
                                    @if ($pl->id == $sl->patientId)
                                        <tr class="moreInfoAboutExtra moreInfoAboutCloseHeader">
                                            <th scope="col"></th>
                                            <th scope="col">Om patienten gick hem</th>
                                            <th scope="col">Antal dagar patienten stannade</th>
                                            <th scope="col">Om patienten tyckte det var enkelt</th>
                                            <th scope="col">Kommentar till spelet</th>
                                        </tr>
                                        <tr class="moreInfoAboutExtra moreInfoAboutCloseData">
                                            {{-- <td>{{ \App\Patient::where('statisticId', $sl->id)->first()->id }}</td> --}}
                                            <td></td>
                                            <td>{{$sl->hasGoneHome == 1 ? "Ja" : "Nej"}}</td>
                                            <td>{{$sl->dayAmount}}</td>
                                            <td>{{$sl->wasEasyToPlay == 1 ? "Enkelt" : "Svårt"}}</td>
                                            <td>{{$sl->explainWhy}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            {{-- <tr>
                            <td>{{ $filterPatients }}8</td>
                            <td>{{ $filterSteps }}</td>
                            <td>{{ $filterMeters }}653</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>



        {{-- LISTA --}}
        {{-- Visa statitiklista för alla patienter --}}
        {{-- <div class="row">
            <div class="col">
                <table class="table table-light table-bordered table-striped table-hover table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Om patienten gick hem</th>
                            <th scope="col">Antal dagar patienten stannade</th>
                            <th scope="col">Om patienten tyckte det var enkelt</th>
                            <th scope="col">Kommentar till spelet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statisticsList as $sl) --}}
                            {{-- <tr style="border: 2px solid"> --}}
                                {{-- <td>{{ \App\Patient::where('statisticId', $sl->id)->first()->id }}</td> --}}
                                {{-- <td>{{$sl->patient->id}}</td>
                                <td>{{$sl->hasGoneHome == 1 ? "Ja" : "Nej"}}</td>
                                <td>{{$sl->dayAmount}}</td>
                                <td>{{$sl->wasEasyToPlay == 1 ? "Enkelt" : "Svårt"}}</td>
                                <td>{{$sl->explainWhy}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}

        <div class="row">
            <div class="col text-right">
                <a  id="downloadStatistics" class="btn-admin btn-trust btn-medium start-loader">Ladda hem statistiken i en excel fil</a>
            </div>
        </div>
    </div>


    <div class="col-md-2 order-1 order-md-2">
        <div class="text-right">
            <a href="#" data-toggle="popover" data-trigger="focus" title="Statistik" data-content="Ladda ner statistiken i ett excel dokument." style="white-space:nowrap;"><img src="{{url('/')}}/images/icon-question.png" width="70px" id="question-mark"></a>
        </div>
    </div>


</div>
</div>
@endsection



@section('body-script')
    <script type="text/javascript">
    $('.moreInfoAboutExtra').hide();
    $('.moreInfoAboutCloseHeader').prev().addClass('moreInfoAboutBtn');
    $(document).ready(function(){
        $('.moreInfoAboutBtn').click(function() {
            $(this).next().toggle();
            $(this).next().next().toggle();
        });
        $('.moreInfoAboutCloseHeader').click(function(){
            $(this).toggle();
            $(this).next().toggle();
        });
        $('.moreInfoAboutCloseData').click(function(){
            $(this).toggle();
            $(this).prev().toggle();
        });

        // $("form").submit(function() {
        //     startLoader();
        // });

        $('#ifFilterRadio1, #ifFilterRadio2').change(function() {
            if ($('#ifFilterRadio2').prop('checked')) {
                $('.date-input-row').show();
            } else {
                $('.date-input-row').hide();
            }
        });


        $('#filter-btn').click(function() {
            event.preventDefault();
            var fromDate = $('#from-date-input').val();
            console.log(fromDate);
            var toDate = $('#to-date-input').val();
            console.log(toDate);
            startLoader();
            $.ajax({
                type: "POST",
                async: true,
                headers: {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{url('/')}}/admin/showStatistics/filter",
                data: {fromDate: fromDate, toDate: toDate},
                dataType: 'json',
                success: function(data) { // Om det LYCKADES
                    console.log(data);
                    console.log(data['statisticsList']);
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
        $('#downloadStatistics').click(function() {
            event.preventDefault();
            startLoader();
            $.ajax({
                cache: false,
                url: "{{url('/')}}/admin/showStatistics/download",
                dataType: 'json',
                success: function (response, textStatus, request) {
                    console.log(response);
                    var a = document.createElement("a");
                    a.href = response.file;
                    a.download = response.name;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    stopLoader();
                }, // SLUT - Om det LYCKADES
                error: function (ajaxContext) {
                    toastr.error('Export error: '+ajaxContext.responseText);
                    stopLoader();
                }
            }); // SLUT - Om det MISSLYCKADES

            // return false;
        });
    });

    </script>

@endsection
