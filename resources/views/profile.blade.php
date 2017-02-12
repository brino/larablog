@extends('layouts.hero')


@section('title')
    @if(!Auth::guest() && $user->name == Auth::user())
        My
    @else
        {{ $user->name }}
    @endif
@stop


@section('heading')

    <figure class="image is-64 pull-left" style="margin-right: 20px;">
        <img src="{{ $user->avatarUrl() }}" title="{{ $user->name }}">
    </figure>


    <span class="icon is-medium"><i class="fa fa-user-circle-o"></i></span>

    @if(!Auth::guest() && $user->name == Auth::user())
        My
    @else
        {{ $user->name }}
    @endif

    @if(!empty($category))
        :: {{ $category->name }}
    @endif

    @can('update-user',$user)
    <span class="pull-right">
        <a class="button is-primary" href="{{ route('user.edit',$user) }}">Edit</a>
    </span>
    @endcan
@stop

@section('subheading')
    {{ $user->bio }}
@endsection


@section('content')

    @if($info)
        <div class="notification is-success">
            {{--<button class="delete"></button>--}}
            <span class="icon"><i class="fa fa-info"></i></span> {{ $info }}
        </div>
    @endif

    @include('profile.show')

@endsection


