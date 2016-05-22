<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/19/16
 * Time: 6:21 AM
 */
?>

@extends('layouts.app')


@section('title')
    About
@stop


@section('heading')
    <span class="fa fa-info-circle"></span> About :: Brian Mix
@stop


@section('content')
    @include('about.me')
@endsection

