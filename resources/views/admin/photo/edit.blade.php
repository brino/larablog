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
    <span class="icon"><i class="fa fa-camera-retro"></i></span> Edit Photo
    <span class="pull-right">
        @can('update-photo',$photo)
            {!! Form::model($photo, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\PhotoController@destroy',$photo]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-lg']) !!}
            {!! Form::close() !!}
        @endcan
    </span>
@stop


@section('content')

    <div class="container">
        {!! Form::model($photo, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\PhotoController@update',$photo]]) !!}

        @include('admin.photo.form')

        {!! Form::submit('Save',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
        {!! Form::close() !!}
    </div>



@endsection





