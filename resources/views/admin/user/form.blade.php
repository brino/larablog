<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:58 PM
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            User
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'My New Category']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'email@domain.com']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('contributor') ? ' has-error' : '' }}">
                    {!! Form::label('contributor','Contributor') !!}
                    {!! Form::select('contributor',['0'=>'No','1'=>'Yes'],$user->contributor,['class'=>'form-control']) !!}
                    @if ($errors->has('contributor'))
                        <span class="help-block">
                    <strong>{{ $errors->first('contributor') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('super') ? ' has-error' : '' }}">
                    {!! Form::label('super','Super') !!}
                    {!! Form::select('super',['0'=>'No','1'=>'Yes'],$user->super,['class'=>'form-control']) !!}
                    @if ($errors->has('super'))
                        <span class="help-block">
                    <strong>{{ $errors->first('super') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

