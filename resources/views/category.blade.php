<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 7:15 AM
 */
?>

@extends('layouts.app')


@section('title')
    Category {{ $category->name }}
@stop


@section('heading')

    <span class="fa fa-list"></span> Category
    @if(!empty($category))
        :: {{ $category->name }}
    @endif

@stop


@section('content')

    @include('partials.results')

    <div class="row">
        <div class="col-md-9">
            @include('article.list')
        </div>
        <div class="col-md-3">
            @include('category.list')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                {!! $articles->render() !!}
            </div>
        </div>
    </div>

@endsection


