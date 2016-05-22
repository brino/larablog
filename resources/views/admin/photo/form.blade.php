<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 11:25 AM
 */
?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Photo
            </div>
        </div>
        <div class="panel-body">

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </div>
            <hr>

            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                {!! Form::label('slug','Slug') !!}
                {!! Form::text('slug',null,['class'=>'form-control']) !!}
                @if ($errors->has('slug'))
                    <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
                @endif
            </div>
            <hr>

            {!! Form::label('description','Description') !!}
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::textarea('description',null,['class'=>'form-control editor-html']) !!}
                        @if ($errors->has('description'))
                            <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
                {!! Form::label('published_at','Publish') !!}
                {!! Form::date('published_at',!empty($photo->published_at)?$photo->published_at:\Carbon\Carbon::now(),['class'=>'form-control']) !!}
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

            <div class="form-group">

                @if(!empty($photo->url))
                    <img src="{{ asset('storage/'.$photo->url) }}" class="img-responsive" />

{{--                    {!! link_to_route('admin.photo.destroy','Delete Photo',null,['class'=>'btn btn-danger btn-block']) !!}--}}
                    <hr>
                @endif

                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    {!! Form::label('url','Photo') !!}
                    {!! Form::file('url') !!}
                    @if(!empty($photo->url))
                        {!! Form::hidden('url') !!}
                    @endif
                    <p class="help-block">Photo must be a .jpg or .phg less than 2MB and will be re-sized to 1920 x 1200</p>
                    @if ($errors->has('url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
