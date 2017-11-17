@extends('layouts.app')

@section('title', 'Start!')

@section('script')
<link rel="stylesheet" href="{{url('/')}}/css/test.css">
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col col-md-3">
                <img src="./images/help.png" alt="Help">
                <p class="text-center">Hjälp</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md">
                <img src="./images/logo.png" alt="Logo">
            </div>
            <div class="col-md-6">
                <h1 class="text-center">Walk the Ward</h1>
                <h2 class="text-center">Vandring i vården - Ett aktivitetsspel :D</h2>
            </div>
            <div class="col-md">
                <a href="{{url('/')}}/registration">col-sm</a>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="btn-new-user">
                    <p>
                        Cool new user!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
