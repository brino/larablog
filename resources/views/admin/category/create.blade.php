<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 7:46 AM
 */
?>

@extends('layouts.app')


@section('title')
    Create Article
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-pencil-square-o"></i></span> Create Article
@stop


@section('content')
    {!! Form::open(['id'=>'create-form','route' => 'category.store']) !!}

    @include('admin.category.form')

    {!! Form::submit('Create',['class'=>'btn btn-primary btn-block btn-lg']) !!}
    {!! Form::close() !!}
@endsection



