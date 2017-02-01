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
    Edit Tag
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-pencil-square-o"></i></span> Edit Tag

    @can('update-tag')
        <span class="pull-right">
            {!! Form::model($tag, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\TagController@destroy',$tag]]) !!}
            {!! Form::submit('Delete',['class'=>'button is-danger']) !!}
            {!! Form::close() !!}
        </span>
    @endcan

@stop


@section('content')

    <div class="container">
        {!! Form::model($tag, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\TagController@update',$tag]]) !!}

        @include('admin.tag.form')

        {!! Form::submit('Save',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
        {!! Form::close() !!}
    </div>

    <div class="container" style="margin-top:20px;">

    </div>

@endsection






