@extends('layouts.app')


@section('title')
    Latest
@stop

@section('meta')
    <meta property="og:title" content="Latest Articles">
    <meta property="og:description" content="Latest web development, technology, outdoors related articles for {{ env('APP_NAME') }}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">
    <meta name="description" content="Latest web development, technology, outdoors related articles for {{ env('APP_NAME') }}"/>
@stop

@section('heading')
    <span class="icon is-medium"><i class="fa fa-feed"></i></span> Latest
@stop

@section('content')
    <div class="columns">
        <div class="column is-three-quarters" style="min-height: 40em">
            @include('article.list')
        </div>
        <div class="column">
            @include('photo.list')
        </div>
    </div>

@endsection
