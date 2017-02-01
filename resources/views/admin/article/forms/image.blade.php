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
        Images
    </div>
    <div class="panel-block">
        @unless(empty($article->banner))
            <div class="box">
                <figure class="image">
                    <img src="@if(str_contains($article->banner,'placehold.it')){{ $article->banner }}@else{{ asset('storage/'.$article->banner) }}@endif" id="img-article" style="margin-bottom:10px;">
                    {!! Form::button('Delete',['name'=>'banner','class'=>'button is-danger is-small','type'=>'submit']) !!}
                </figure>
            </div>
        @endunless

        {!! Form::label('banner','Banner',['class'=>'label']) !!}
        <p class="control">
            {!! Form::file('banner') !!}

            <p class="help is-info">1024x250 .jpg or .png</p>
            @if ($errors->has('banner'))
                <span class="help is-danger">
                <strong>{{ $errors->first('banner') }}</strong>
            </span>
            @endif
        </p>

        @unless(empty($article->thumbnail))
            <div class="box">
                <figure class="image">
                    <img src="@if(str_contains($article->thumbnail,'placehold.it')){{ $article->thumbnail }}@else{{ asset('storage/'.$article->thumbnail) }}@endif" align="center" style="margin-bottom:10px;">
                    <div class="text-center">{!! Form::button('Delete',['name'=>'thumbnail','class'=>'button is-danger is-small','type'=>'submit']) !!}</div>
                </figure>
            </div>
        @endunless

        {!! Form::label('thumbnail','Thumbnail',['class'=>'label']) !!}
        <p class="control">
            {!! Form::file('thumbnail') !!}
            <p class="help is-info">Photo must be a .jpg or .phg less than 2MB and will be resized to 200x200</p>
            @if ($errors->has('thumbnail'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('thumbnail') }}</strong>
                </span>
            @endif
            {{--</div>--}}
        </p>
    </div>
</div>
