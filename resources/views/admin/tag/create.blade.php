<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 11:34 AM
 */
?>

@extends('layouts.app')


@section('title')
    Create Tag
@stop


@section('heading')
    <span class="fa fa-pencil-square-o"></span> Create Tag
@stop


@section('content')

    {!! Form::open(['id'=>'create-form','route' => 'tag.store']) !!}

        @include('admin.tag.form')

        {!! Form::submit('Create',['class'=>'button is-primary is-large']) !!}
    {!! Form::close() !!}
@endsection




