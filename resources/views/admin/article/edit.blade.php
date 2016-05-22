<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:44 AM
 */
?>

@extends('layouts.app')


@section('title')
    Edit Article
@stop


@section('heading')
    <span class="fa fa-pencil-square-o"></span> Edit Article
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($article, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\ArticleController@update',$article]]) !!}

            @include('admin.article.forms.info')

            @include('admin.article.forms.body')

            @include('admin.article.forms.image')

            {!! Form::submit('Save',['class'=>'btn btn-primary btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row" style="margin-top:20px;">
        <div class="col-sm-12">
            {!! Form::model($article, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\ArticleController@destroy',$article]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection




