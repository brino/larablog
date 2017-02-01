@extends('layouts.app')


@section('title')
    Profile
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-user-circle-o"></i></span>

    @if(!Auth::guest() && $user->name == Auth::user())
        My
    @else
        {{ $user->name }}'s
    @endif
    Profile

    @if(!empty($category))
        :: {{ $category->name }}
    @endif

    @can('update-user',$user)
    <span class="pull-right">
        {{--@if($user->name == Auth::user()->name)--}}
            <a class="button is-primary" href="{{ route('user.edit',$user) }}">Edit</a>
        {{--@endif--}}
    </span>
    @endcan
@stop


@section('content')

    @if($info)
        <div class="notification is-success">
            {{--<button class="delete"></button>--}}
            <span class="icon"><i class="fa fa-info"></i></span> {{ $info }}
        </div>
    @endif

    @include('profile.show')

@endsection


