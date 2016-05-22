<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:43 AM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Images
        </div>
    </div>
    <div class="panel-body">
        @unless(empty($article->banner))
            <p>
                <img src="{{ asset('storage/'.$article->banner) }}" class="img-responsive" id="img-article" style="margin-bottom:10px;">
                {!! Form::button('Delete',['name'=>'banner','class'=>'btn btn-danger btn-block btn-xs','type'=>'submit']) !!}
            </p>
        @endunless
        <div class="form-group">

            <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                {!! Form::label('banner','Banner') !!}
                {!! Form::file('banner') !!}

                <p class="help-block">1024x250 .jpg or .png</p>
                @if ($errors->has('banner'))
                    <span class="help-block">
                    <strong>{{ $errors->first('banner') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <hr>

        @unless(empty($article->thumbnail))
            <p class="text-center">
                <img src="{{ asset('storage/'.$article->thumbnail) }}" align="center" style="margin-bottom:10px;">
                <div class="text-center">{!! Form::button('Delete',['name'=>'thumbnail','class'=>'btn btn-danger btn-xs','type'=>'submit']) !!}</div>
            </p>
        @endunless

        <div class="form-group">

            <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }}">
                {!! Form::label('thumbnail','Thumbnail') !!}
                {!! Form::file('thumbnail') !!}
                @if(!empty($article->banner))
                    {!! Form::hidden('thumbnail') !!}
                @endif
                <p class="help-block">Photo must be a .jpg or .phg less than 2MB and will be resized to 200x200</p>
                @if ($errors->has('thumbnail'))
                    <span class="help-block">
                    <strong>{{ $errors->first('thumbnail') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
