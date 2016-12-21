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
    <span class="icon is-medium"><i class="fa fa-pencil-square-o"></i></span> Edit Article
    @can('update-article',$article)
        <span class="pull-right">
            {!! Form::model($article, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\ArticleController@destroy',$article]]) !!}
            {!! Form::submit('Delete',['class'=>'button is-danger']) !!}
            {!! Form::close() !!}
        </span>
    @endcan
@stop


@section('content')

    <div class="container">
        {!! Form::model($article, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\ArticleController@update',$article]]) !!}

        @include('admin.article.forms.info')

        @include('admin.article.forms.body')

        @include('admin.article.forms.image')

        {!! Form::submit('Save',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
        {!! Form::close() !!}
    </div>

@endsection

@section('last')
    <script src="{{ elixir('js/article-editor.js') }}"></script>
@endsection




