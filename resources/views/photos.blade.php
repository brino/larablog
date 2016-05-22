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
    Latest Photos
@stop


@section('heading')
    <span class="fa fa-list"></span> Photos
    @if(!empty($category))
        :: {{ $category->name }}
    @endif
@stop


@section('content')

    <div class="row">
        @include('photo.list')
    </div>

    <div class="text-center">
        {{--{!! $photos->render() !!}--}}
    </div>

@endsection


