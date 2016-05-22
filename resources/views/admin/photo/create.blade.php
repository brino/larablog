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
    Create Photo
@stop


@section('heading')
    <span class="fa fa-camera-retro"></span> Create Photo
@stop


@section('content')

    {!! Form::open(['id'=>'create-form','route' => 'admin.photo.store','files' => true]/*['method' => 'POST', 'action' => ['DatalicensesController@store',$datalicense]]*/) !!}

    @include('admin.photo.form')

    {!! Form::submit('Create',['class'=>'btn btn-primary btn-block btn-lg']) !!}
    {!! Form::close() !!}
@endsection




