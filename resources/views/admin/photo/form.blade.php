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
            Photo
        </div>
        <div class="panel-block">
            {!! Form::label('title','Title',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('title',null,['class'=>$errors->has('title')?'input is-danger':'input']) !!}
                @if ($errors->has('title'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </p>

            {!! Form::label('slug','Slug',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('slug',null,['class'=>$errors->has('slug')?'input is-danger':'input']) !!}
                @if ($errors->has('slug'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </p>

            {!! Form::label('description','Description',['class'=>'label']) !!}
            <p class="control">
                {!! Form::textarea('description',null,['class'=>$errors->has('description')?'textarea editor-html is-danger':'textarea editor-html']) !!}
                @if ($errors->has('description'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </p>

            {!! Form::label('published_at','Publish',['class'=>'label']) !!}
            <p class="control">
                {!! Form::date('published_at',!empty($photo->published_at)?$photo->published_at:\Carbon\Carbon::now(),['class'=>$errors->has('published_at')?'input is-danger':'input']) !!}
                @if ($errors->has('published_at'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('published_at') }}</strong>
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
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </p>


            @if(!empty($photo->url))
                <div class="box">
                    <figure class="image">
                        <img src="{{ asset('storage/'.$photo->url) }}" title="Image">
                    </figure>
                </div>
            @endif

            {!! Form::label('url','Photo',['class'=>'label']) !!}
            <p class="control has-addons">
                {{--{!! Form::text('url',null,['class'=>'input']) !!}--}}
                {!! Form::file('url') !!}
                @if(!empty($photo->url))
                    {!! Form::hidden('url') !!}
                @endif
                <p class="help is-info">Photo must be a .jpg or .phg less than 2MB and will be re-sized to 1920 x 1200</p>

                @if ($errors->has('url'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </p>
        </div>
    </div>
