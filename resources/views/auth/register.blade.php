@extends('layouts.app')

@section('title')
    Register
@stop


@section('heading')
    <div class="column is-half is-offset-one-quarter">
        <span class="icon is-medium"><i class="fa fa-user-plus"></i></span> Register
    </div>
@stop

@section('content')
<div class="container">
    {{--<div class="row">--}}
        <div class="column is-half is-offset-one-quarter">
            <div class="panel">
                <div class="panel-heading">Register</div>
                <div class="panel-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                            <label class="label">Name</label>

                            <p class="control{{ $errors->has('name') ? ' is-danger' : '' }}">
                                <input type="text" class="input" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </p>

                            <label class="label">E-Mail Address</label>

                            <p class="control{{ $errors->has('email') ? ' is-danger' : '' }}">
                                <input type="email" class="input" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </p>

                            <label class="label">Password</label>

                            <p class="control{{ $errors->has('password') ? ' is-danger' : '' }}">
                                <input type="password" class="input" name="password">

                                @if ($errors->has('password'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </p>

                            <label class="label">Confirm Password</label>

                            <p class="control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" class="input" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help is-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </p>

                            <p class="control">
                                <button type="submit" class="button is-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    {{--</div>--}}
</div>
@endsection
