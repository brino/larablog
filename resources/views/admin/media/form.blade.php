<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 11:25 AM
 */
?>

    <div class="panel">
        <div class="panel-heading">
            Media
        </div>
        <div class="panel-block">
            {!! Form::label('title','Title',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('title',null,['class'=>$errors->has('title')?'input is-danger':'input']) !!}
                @if ($errors->has('title'))
                    <span class="help is-danger">
                        {{ $errors->first('title') }}
                    </span>
                @endif
            </p>

            {{--{!! Form::label('slug','Slug',['class'=>'label']) !!}--}}
            {{--<p class="control">--}}
                {{--{!! Form::text('slug',null,['class'=>$errors->has('slug')?'input is-danger':'input']) !!}--}}
                {{--@if ($errors->has('slug'))--}}
                    {{--<span class="help is-danger">--}}
                        {{--{{ $errors->first('slug') }}--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}

            {!! Form::label('description','Description',['class'=>'label']) !!}
            <p class="control">
                {!! Form::textarea('description',null,['class'=>$errors->has('description')?'textarea is-danger':'textarea']) !!}
                @if ($errors->has('description'))
                    <span class="help is-danger">
                        {{ $errors->first('description') }}
                    </span>
                @endif
            </p>

            {!! Form::label('published_at','Publish',['class'=>'label']) !!}
            <p class="control">
                {!! Form::date('published_at',!empty($media->published_at)?$media->published_at:\Carbon\Carbon::now(),['class'=>$errors->has('published_at')?'input is-danger':'input']) !!}
                @if ($errors->has('published_at'))
                    <span class="help is-danger">
                        {{ $errors->first('published_at') }}
                    </span>
                @endif
            </p>

            {!! Form::label('category_id','Category',['class'=>'label']) !!}
            <p class="control">
                <span class="select">
                    {!! Form::select('category_id',$categories,null,['class'=>$errors->has('category_id')?'is-danger':'','placeholder'=>'Choose']) !!}
                </span>
                @if ($errors->has('category_id'))
                    <span class="help is-danger">
                        {{ $errors->first('category_id') }}
                    </span>
                @endif
            </p>


            @unless(empty($media->url))
                <div class="box">
                    <figure class="image is-3by2">
                        <img src="{{ $media->url() }}" title="Image">
                    </figure>
                    <div class="text-center">
                        <a href="#" onclick="document.getElementById('delete-media').submit()" class="button is-danger is-small">Delete</a>
                    </div>
                </div>
            @endunless

            {!! Form::label('url','Media',['class'=>'label']) !!}
            <p class="control has-icon">

                <upload name="url"></upload>

                @if ($errors->has('url'))
                    <span class="help is-danger">
                        {{ $errors->first('url') }}
                    </span>
                @endif
            </p>
        </div>
    </div>
