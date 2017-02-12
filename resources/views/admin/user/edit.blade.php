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
    <span class="icon"><i class="fa fa-pencil-square-o"></i></span> Edit User
    <span class="pull-right">
        {!! Form::model($user, ['id'=>'delete-form','method' => 'DELETE','action' => ['Admin\UserController@destroy',$user]]) !!}
        {!! Form::submit('Delete',['class'=>'button is-danger']) !!}
        {!! Form::close() !!}
    </span>
@stop


@section('content')

    <div class="container">
        {!! Form::model($user, ['id'=>'edit-form','method' => 'PATCH', 'files' => true, 'action' => ['Admin\UserController@update',$user]]) !!}

        @include('admin.user.form')

        {!! Form::submit('Save',['class'=>'button is-primary is-large']) !!}
        <a class="button is-large" href="{{ URL::previous() }}"> Back </a>
        {!! Form::close() !!}
    </div>

@endsection







