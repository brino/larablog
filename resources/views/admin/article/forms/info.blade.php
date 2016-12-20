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
        Info
    </div>
    <div class="panel-block">
        {!! Form::label('title','Title',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('title',null,['class'=>$errors->has('title')?'input is-danger':'input','placeholder'=>'My Article']) !!}
            @if ($errors->has('title'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </p>

        {!! Form::label('slug','Slug',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('slug',null,['class'=>$errors->has('slug')?'input is-danger':'input','placeholder'=>'my-article']) !!}
            @if ($errors->has('slug'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </p>

        {!! Form::label('published_at','Publish',['class'=>'label']) !!}
        <p class="control">
            {!! Form::date('published_at',!empty($article->published_at)?$article->published_at:\Carbon\Carbon::now(),['class'=>$errors->has('published_at')?'input is-danger':'input']) !!}
            @if ($errors->has('published_at'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('published_at') }}</strong>
                </span>
            @endif
        </p>

        {!! Form::label('category_id','Category',['class'=>'label']) !!}
        <p class="control">
            {!! Form::date('published_at',!empty($article->published_at)?$article->published_at:\Carbon\Carbon::now(),['class'=>$errors->has('category_id')?'input is-danger':'input']) !!}
            @if ($errors->has('published_at'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('published_at') }}</strong>
                </span>
            @endif
        </p>

        {!! Form::label('tag_list','Tags',['class'=>'label']) !!}
        <p class="control" style="min-height:100px;">
            <span class="select">
                {!! Form::select('tag_list[]',$tags,null,['class'=>$errors->has('tag_list')?'is-danger':'', 'multiple', 'id'=>'tags', 'style' => "min-height:100px;"]) !!}
            </span>
            @if ($errors->has('tag_list'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('tag_list') }}</strong>
                </span>
            @endif
        </p>

        {!! Form::label('summary','Summary',['class'=>'label']) !!}
        <p class="control">
            {!! Form::textarea('summary',null,['class'=>$errors->has('summary')?'textarea editor-html is-danger':'textarea editor-html','placeholder'=>'Summary']) !!}
            @if ($errors->has('summary'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
            @endif
        </p>
    </div>
</div>
