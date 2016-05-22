<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 11:34 AM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Tag
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
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    {!! Form::label('slug','Slug') !!}
                    {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'my-new-category']) !!}
                    @if ($errors->has('slug'))
                        <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
