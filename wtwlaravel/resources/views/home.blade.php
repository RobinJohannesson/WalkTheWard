@extends('layouts.app')

@section('body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>{{ Auth::user()->name }}</h1>


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <p>Du är nu inloggad!</p>
                <div class="row no-gutters">
                    <div class="col-md-6 text-left">
                        <a href="{{url('/')}}/admin" class="btn-trust btn-medium start-loader">Gå till Administration</a>

                    </div>
                    <div class="col-md-6 text-right">
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
        </div>

    </div>
@endsection
