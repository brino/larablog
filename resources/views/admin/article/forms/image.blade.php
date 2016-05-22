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
        @if(!empty($article->banner))
            <img src="{{ asset('storage/'.$article->banner) }}" class="img-responsive" id="img-article">
            {{--{!! Html::link_to_route('image.delete') !!}--}}
        @endif
        <div class="form-group">

            <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                {!! Form::label('banner','Banner') !!}
                {!! Form::file('banner') !!}
                @if(!empty($article->banner))
                    {!! Form::hidden('banner') !!}
                @endif
                <p class="help-block">1024x250 .jpg or .png</p>
                @if ($errors->has('banner'))
                    <span class="help-block">
                    <strong>{{ $errors->first('banner') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <hr>

        @if(!empty($article->thumbnail))
            <img src="{{ asset('storage/'.$article->thumbnail) }}" class="img-responsive">
            {{--{!! Html::link_to_route('image.delete') !!}--}}
        @endif

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
