@extends('layouts.app')


{{--@section('title')--}}
    {{--Contributors--}}
{{--@stop--}}


@section('heading')

    <span class="icon is-medium"><i class="fa fa-user-o"></i></span> Contributors

@stop


@section('content')

    @include('contributor.list')

@endsection
