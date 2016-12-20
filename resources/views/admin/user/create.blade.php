<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:57 PM
 */
?>

@extends('layouts.app')


@section('title')
    Create User
@stop


@section('heading')
    <span class="icon"><i class="fa fa-pencil-square-o"></i></span> Create User
@stop


@section('content')

    {!! Form::open(['id'=>'create-form','route' => 'user.store']) !!}

    @include('admin.user.form')

    {!! Form::submit('Create',['class'=>'btn btn-primary btn-block btn-lg']) !!}
    {!! Form::close() !!}
@endsection





