<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 2:05 PM
 */
?>

@extends('layouts.app')


@section('title')
    Create Article
@stop


@section('heading')
    <span class="fa fa-pencil-square-o"></span> Create Article
@stop


@section('content')

    {!! Form::open(['id'=>'create-form','route' => 'admin.article.store','files' => true]) !!}

        @include('admin.article.forms.info')

        @include('admin.article.forms.body')

        @include('admin.article.forms.image')
        {!! Form::submit('Create',['class'=>'btn btn-primary btn-block btn-lg']) !!}
    {!! Form::close() !!}
@endsection



