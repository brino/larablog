<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:43 AM
 */
?>
<div class="panel @if($errors->has('banner')){{ 'is-danger' }}@endif">
    <div class="panel-heading">
        Images
    </div>
    <div class="panel-block">
        {!! Form::label('banner','Banner',['class'=>'label']) !!}
        @unless(empty($article->banner))
            <div class="box">
                <figure class="image">
                    <img src="{{ $article->bannerUrl() }}" id="img-article" style="margin-bottom:10px;">
                    {!! Form::button('Delete',['name'=>'banner','class'=>'button is-danger is-small','type'=>'submit']) !!}
                </figure>
            </div>
        @endunless
        <p class="control has-icon">
            <upload name="banner"></upload>
            @if ($errors->has('banner'))
                <span class="help is-danger">
                    {{ $errors->first('banner') }}
                </span>
            @endif
        </p>

        {!! Form::label('thumbnail','Thumbnail',['class'=>'label']) !!}
        @unless(empty($article->thumbnail))
            <div class="box">
                <figure class="image">
                    <img src="{{ $article->thumbnailUrl() }}" id="img-article" style="margin-bottom:10px;">
                    {!! Form::button('Delete',['name'=>'thumbnail','class'=>'button is-danger is-small','type'=>'submit']) !!}
                </figure>
            </div>
        @endunless

        <p class="control has-icon">
            <upload name="thumbnail"></upload>
            @if ($errors->has('thumbnail'))
                <span class="help is-danger">
                    {{ $errors->first('thumbnail') }}
                </span>
            @endif
        </p>
    </div>
</div>
