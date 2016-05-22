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
    <span class="fa fa-pencil-square-o"></span> Edit Tag
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($tag, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\TagController@update',$tag]]) !!}

            @include('admin.tag.form')

            {!! Form::submit('Save',['class'=>'btn btn-primary btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row" style="margin-top:20px;">
        <div class="col-sm-12">
            {!! Form::model($tag, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\TagController@destroy',$tag]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection






