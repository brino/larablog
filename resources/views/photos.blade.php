<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 5:55 PM
 */
?>
@extends('layouts.app')


@section('title')
    Photos
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-list"></i></span> Photos
    @if(!empty($category))
        :: {{ $category->name }}
    @endif
@stop


@section('content')

    <div class="columns">
        @include('photo.list')
    </div>

    <div class="container has-text-centered">
        {!! $photos->render() !!}
    </div>

@endsection


