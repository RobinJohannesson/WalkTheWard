@extends('layouts.app')

@section('title', 'Återställ lösenord')

@section('head-stylesheet')
    <link rel="stylesheet" href="{{url('/')}}/css/style-admin.css">
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Återställ lösenord</h1>


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="col">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-postadress</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Skicka länk för återställning av lösenord
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
