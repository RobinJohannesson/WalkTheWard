@extends('layouts.app')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <h1>{{ Auth::user()->name }}</h1>


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <p>Du är nu inloggad!</p>

            </div>
        </div>
        
    </div>
@endsection
