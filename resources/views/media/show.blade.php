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
    <meta property="og:title" content="{{ $media->title }}">
    <meta property="og:description" content="{{ $media->description }}">
    <meta property="og:image" content="{{ asset('storage/'.$media->url) }}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="325">
    <meta name="description" content="{{ $media->description }}"/>
@stop

@section('title')
    {{ $media->title }}
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-photo"></i></span> {{ $media->title }}
@stop


@section('content')

    <nav class="level">
        <div class="level-left">
            <div>
                <small>
                    @include('partials.signature',['thing'=>$media])
                    on {{ $media->published_at->toFormattedDateString() }}
                </small>
            </div>
        </div>
    </nav>
    <div class="content">
        <p>{{ $media->description }}</p>
    </div>
    <div class="container">
        <figure class="image is-3by2">
            <img class="img-responsive img-rounded" src="{{ $media->url() }}" />
        </figure>
    </div>

@endsection



