<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 7:51 AM
 */
?>

@extends('layouts.app')


@section('title')
    Edit Category
@stop


@section('heading')
    <span class="fa fa-pencil-square-o"></span> Edit Category
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($category, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\CategoryController@update',$category]]) !!}

            @include('admin.category.form')

            {!! Form::submit('Save',['class'=>'btn btn-primary btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row" style="margin-top:20px;">
        <div class="col-sm-12">
            {!! Form::model($category, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\CategoryController@destroy',$category]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection





