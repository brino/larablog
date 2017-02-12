@extends('layouts.app')


@section('title')
    Tag {{ $tag->name }}
@stop


@section('heading')

    <span class="icon is-medium"><i class="fa fa-list"></i></span> Tag
    @if(!empty($tag))
        :: {{ $tag->name }}
    @endif

@stop


@section('content')

    @include('partials.results')

    <div class="row">
        <div class="col-sm-9">
            @include('article.list')
        </div>
        <div class="col-sm-3">
            @include('category.list')
        </div>
    </div>

@endsection



