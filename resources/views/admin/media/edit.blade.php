<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 11:24 AM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 11:24 AM
 */
?>

@extends('layouts.app')


@section('title')
    Edit Media
@stop


@section('heading')
    <span class="icon"><i class="fa fa-camera-retro"></i></span> Edit Media
    <span class="pull-right">
        @can('update-media',$media)
            {!! Form::model($media, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\MediaController@destroy',$media]]) !!}
            {!! Form::submit('Delete',['class'=>'button is-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </span>
@stop


@section('content')
    <div class="container">
        {!! Form::model($media, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\MediaController@update',$media]]) !!}

        @include('admin.media.form')

        {!! Form::submit('Save',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
        {!! Form::close() !!}

        {!! Form::model($media, ['id' => 'delete-media', 'method' => 'DELETE', 'action' => ['Admin\MediaController@removeMedia', $media]]) !!}
        {!! Form::close() !!}
    </div>
@endsection





