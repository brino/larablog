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
    Media
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-list"></i></span> Media
    @if(!empty($category))
        :: {{ $category->name }}
    @endif
@stop


@section('content')

    @include('media.list')


    <div style="clear:both;"></div>
    <div class="container has-text-centered" style="margin-top:20px;">
        {!! $media->render() !!}
    </div>

@endsection


