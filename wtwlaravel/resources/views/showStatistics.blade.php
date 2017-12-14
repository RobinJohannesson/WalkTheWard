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

                {{-- FILTERING --}}
                {{-- Visa data från DATE till DATE--}}
                <input type="date" name="" value="">
                <input type="date" name="" value="">

                {{-- Antal patient som spelat --}}
                {{-- Hur många steg som de har gått --}}
                {{-- Hur många meter som de har gått --}}
                <table>
                    <thead>
                        <tr>
                            <th>Antal patienter</th>                            
                            <th>Antal steg</th>
                            <th>Antal meter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patientList as $pl)
                            <tr style="border: 2px solid">
                                <td>{{$pl->age}}</td>
                                <td>{{$pl->roomType}}</td>
                                <td>{{$pl->distanceInMeter}}</td>
                            </tr>
                        @endforeach
                        <td>{{-- $filterPatients--}}8</td>
                        <td>{{-- $filterSteps--}}850</td>
                        <td>{{-- $filterMeters--}}653</td>
                    </tbody>
                </table>



                {{-- LISTA --}}
                {{-- Visa statitiklista för alla patienter --}}
                <table>
                    <thead>
                        <tr>
                            <th>Om patienten gick hem</th>
                            <th>Antal dagar patienten stannade</th>
                            <th>Om patienten tyckte det var enkelt</th>
                            <th>Kommentar till spelet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statisticsList as $sl)
                            <tr style="border: 2px solid">
                                <td>{{$sl->hasGoneHome == 1 ? "Ja" : "Nej"}}</td>
                                <td>{{$sl->dayAmount}}</td>
                                <td>{{$sl->wasEasyToPlay == 1 ? "Enkelt" : "Svårt"}}</td>
                                <td>{{$sl->explainWhy}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="" class="btn-admin btn-trust btn-medium start-loader">Ladda hem statistiken i en excel fil</a>
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
    $(document).ready(function(){

        $("form").submit(function() {
            startLoader();
        });
    });
    </script>

@endsection
