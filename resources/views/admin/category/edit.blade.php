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
    <span class="icon is-medium"><i class="fa fa-pencil-square-o"></i></span> Edit Category
    @can('update-category')
        <span class="pull-right">
            {!! Form::model($category, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\CategoryController@destroy', $category]]) !!}
            {!! Form::submit('Delete',['class'=>'button is-danger']) !!}
            {!! Form::close() !!}
        </span>
    @endcan
@stop


@section('content')

    @include('partials.info')

    <div class="container">
        {!! Form::model($category, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\CategoryController@update', $category]]) !!}

        @include('admin.category.form')

        {!! Form::submit('Save',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
        {!! Form::close() !!}

    </div>

@endsection




