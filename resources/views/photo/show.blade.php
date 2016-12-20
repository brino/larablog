<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 6:07 PM
 */
?>

@extends('layouts.app')

@section('meta')
    <meta property="og:title" content="{{ $photo->title }}">
    <meta property="og:description" content="{{ $photo->description }}">
    <meta property="og:image" content="{{ asset('storage/'.$photo->url) }}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="325">
    <meta name="description" content="{{ $photo->description }}"/>
@stop

@section('title')
    {{ $photo->title }}
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-photo"></i></span> {{ $photo->title }}
@stop


@section('content')

    <nav class="level">
        <div class="level-left">
            <small>
                @include('partials.signature',['thing'=>$photo])
                on {{ $photo->published_at->toFormattedDateString() }}
            </small>
        </div>
    </nav>
    <div class="content">
        <p>{{ $photo->description }}</p>
    </div>
    <div class="container">
        <figure class="image is-4by3">
            <img class="img-responsive img-rounded" src="{{ asset('storage/'.$photo->url) }}" />
        </figure>
    </div>

@endsection



