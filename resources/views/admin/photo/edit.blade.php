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
    Edit Photo
@stop


@section('heading')
    <span class="fa fa-camera-retro"></span> Edit Photo
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($photo, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\PhotoController@update',$photo]]) !!}

            @include('admin.photo.form')

            {!! Form::submit('Save',['class'=>'btn btn-primary btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    @can('update-photo')
    <div class="row" style="margin-top:20px;">
        <div class="col-sm-12">
            {!! Form::model($photo, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\PhotoController@destroy',$photo]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @endcan

@endsection





