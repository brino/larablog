@extends('layouts.app')

@section('title')
    Login
@stop


@section('heading')
    <div class="column is-half is-offset-one-quarter">
        <span class="icon is-medium"><i class="fa fa-sign-in"></i></span> Login
    </div>
@stop

@section('content')
<div class="container">
    {{--<div class="row">--}}
        <div class="column is-half is-offset-one-quarter">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <label class="label">E-Mail Address</label>

                        <p class="control{{ $errors->has('email') ? ' is-danger' : '' }}">
                            <input type="email" class="input" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help is-danger">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </p>

                        <label class="label">Password</label>

                        <p class="control{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="input" name="password">

                            @if ($errors->has('password'))
                                <span class="help is-danger">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </p>

                        <p class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </p>

                        <p class="control">
                            <button type="submit" class="button is-primary">
                                <span class="icon"><i class="fa fa-btn fa-sign-in"></i></span> Login
                            </button>

                            <a class="button" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    {{--</div>--}}
</div>
@endsection
