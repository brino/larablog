<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 9/11/16
 * Time: 7:12 PM
 */
?>

@extends('layouts.app')


@section('title')
    Results {{ $filterCategory->name or '' }} {{ request('query') }}
@stop


@section('heading')

    <span class="fa fa-search"></span> Results

@stop


@section('content')

    @include('partials.total')

    <div class="row">
        <div class="col-md-9">
            @include('article.list')
        </div>
        <div class="col-md-3">
            @include('category.list')
        </div>
    </div>

@endsection


