<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:44 PM
 */
?>

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



