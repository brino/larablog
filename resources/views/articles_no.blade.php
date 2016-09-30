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
    Articles
@stop


@section('heading')

    <span class="fa fa-list"></span> Articles

@stop


@section('content')

    @include('partials.total')

    <div class="row">
        <div class="col-sm-12">
            @include('article.list')
        </div>
    </div>

@endsection

