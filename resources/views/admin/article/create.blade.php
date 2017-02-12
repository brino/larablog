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
    <span class="icon is-medium"><i class="fa fa-pencil-square-o"></i></span> Create Article
@stop


@section('content')

    {!! Form::open(['id'=>'create-form','route' => 'article.store','files' => true]) !!}

        @include('admin.article.forms.info')

        @include('admin.article.forms.body')

        @include('admin.article.forms.image')

        {!! Form::submit('Create',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
    {!! Form::close() !!}
@endsection



