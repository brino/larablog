<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:58 PM
 */
?>

@extends('layouts.app')


@section('title')
    Edit User
@stop


@section('heading')
    <span class="fa fa-pencil-square-o"></span> Edit User
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($user, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\UserController@update',$user]]) !!}

            @include('admin.user.form')

            {!! Form::submit('Save',['class'=>'btn btn-primary btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row" style="margin-top:20px;">
        <div class="col-sm-12">
            {!! Form::model($user, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\UserController@destroy',$user]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection







