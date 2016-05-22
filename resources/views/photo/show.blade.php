<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 6:07 PM
 */
?>

@extends('layouts.app')


@section('title')
    {{ $photo->title }}
@stop


@section('heading')
    <span class="fa fa-photo"></span> {{ $photo->title }}
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <p class="text-muted">
                @include('partials.signature',['thing'=>$photo])
                on {{ $photo->published_at->toFormattedDateString() }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        <img class="img-responsive img-rounded" src="{{ asset('storage/'.$photo->url) }}" />
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>{{ $photo->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection



