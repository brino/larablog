<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/15/16
 * Time: 3:13 PM
 */
?>
@extends('layouts.app')


@section('title')
    Latest Articles
@stop


@section('heading')

    <span class="fa fa-list"></span> Articles
    @if(!empty($category))
        :: {{ $category->name }}
    @endif

    @if($search->has('string'))
        :: Search
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

@endsection

