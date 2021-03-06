<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:38 AM
 */
?>
<div class="panel">
    <div class="panel-heading">
        Info
    </div>
    <div class="panel-block">
        {!! Form::label('title','Title',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('title',null,['class'=>$errors->has('title')?'input is-danger':'input','placeholder'=>'My Article']) !!}
            @if ($errors->has('title'))
                <span class="help is-danger">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </p>

        {!! Form::label('published_at','Publish',['class'=>'label']) !!}
        <p class="control">
            {!! Form::date('published_at',!empty($article->published_at)?$article->published_at:\Carbon\Carbon::now(),['class'=>$errors->has('published_at')?'input is-danger':'input']) !!}
            @if ($errors->has('published_at'))
                <span class="help is-danger">
                    {{ $errors->first('published_at') }}
                </span>
            @endif
        </p>

        <div class="columns">
            <div class="column is-one-third">
                {!! Form::label('category_id','Category',['class'=>'label']) !!}
                <p class="control">
                    <span class="select">
                        {!! Form::select('category_id',$categories,null,['class'=>$errors->has('category_id')?'is-danger':'', 'id'=>'category']) !!}
                        @if ($errors->has('category_id'))
                            <span class="help is-danger">
                            {{ $errors->first('category_id') }}
                        </span>
                        @endif
                    </span>
                </p>

                {!! Form::label('tag_list','Tags',['class'=>'label']) !!}
                <p class="control" style="min-height:150px;">
                    <span class="select">
                        {!! Form::select('tag_list[]',$tags,null,['class'=>$errors->has('tag_list')?'is-danger':'', 'multiple', 'id'=>'tags', 'style' => "min-height:150px;"]) !!}
                    </span>
                    @if ($errors->has('tag_list'))
                        <span class="help is-danger">
                            {{ $errors->first('tag_list') }}
                        </span>
                    @endif
                </p>
            </div>
            <div class="column">
                {!! Form::label('summary','Summary',['class'=>'label']) !!}
                <p class="control">
                    {!! Form::textarea('summary',null,['id'=>'article-summary','class'=>$errors->has('summary')?'textarea is-danger':'textarea','placeholder'=>'Summary']) !!}
                    @if ($errors->has('summary'))
                        <span class="help is-danger">
                            {{ $errors->first('summary') }}
                        </span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
