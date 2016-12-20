@extends('layouts.app')


@section('title')
    Photos
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-user-circle-o"></i></span>

    @if($user->name == Auth::user()->name)
        My
    @else
        {{ $user->name }}'s
    @endif
    Profile

    @if(!empty($category))
        :: {{ $category->name }}
    @endif
@stop


@section('content')

    @include('profile.show')

@endsection


