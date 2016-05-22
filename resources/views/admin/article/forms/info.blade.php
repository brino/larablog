<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:38 AM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Info
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'My Article']) !!}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <hr>

        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            {!! Form::label('slug','Slug') !!}
            {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'my-article']) !!}
            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>
        <hr>

        <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
            {!! Form::label('published_at','Publish') !!}
            {!! Form::date('published_at',!empty($article->published_at)?$article->published_at:\Carbon\Carbon::now(),['class'=>'form-control']) !!}
            @if ($errors->has('published_at'))
                <span class="help-block">
                    <strong>{{ $errors->first('published_at') }}</strong>
                </span>
            @endif
        </div>
        <hr>

        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Choose']) !!}
            @if ($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
        <hr>

        <div class="form-group{{ $errors->has('tag_list') ? ' has-error' : '' }}">
            {!! Form::label('tag_list','Tags') !!}
            {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control', 'multiple','id'=>'tags']) !!}
            @if ($errors->has('tag_list'))
                <span class="help-block">
                    <strong>{{ $errors->first('tag_list') }}</strong>
                </span>
            @endif
        </div>
        <hr>

        <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
        {!! Form::label('summary','Summary') !!}
        {!! Form::textarea('summary',null,['class'=>'form-control editor-html','placeholder'=>'Summary']) !!}
            @if ($errors->has('summary'))
                <span class="help-block">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
