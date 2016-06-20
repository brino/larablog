@extends('layouts.app')


@section('title')
    Latest Articles
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
    <span class="fa fa-feed"></span> Latest Articles
@stop


@section('content')

    @include('article.list')

@endsection
