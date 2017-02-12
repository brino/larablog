<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 11:24 AM
 */
?>

@extends('layouts.app')


@section('title')
    Create Media
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-camera-retro"></i></span> Create Media
@stop


@section('content')

    {!! Form::open(['id'=>'create-form','route' => 'media.store','files' => true]) !!}

    @include('admin.media.form')

    {!! Form::submit('Create',['class'=>'button is-primary is-large']) !!}
    <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
    {!! Form::close() !!}
@endsection




