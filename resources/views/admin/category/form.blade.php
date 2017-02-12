<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 7:47 AM
 */
?>
<div class="panel">
    <div class="panel-heading">
        Category
    </div>
    <div class="panel-block">
        {!! Form::label('name','Name',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('name',null,['class'=>$errors->has('name')?'input is-danger':'input','placeholder'=>'My New Category']) !!}
            @if ($errors->has('name'))
                <span class="help is-danger">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </p>

        {{--{!! Form::label('slug','Slug',['class'=>'label']) !!}--}}
        {{--<p class="control">--}}
            {{--{!! Form::text('slug',null,['class'=>$errors->has('slug')?'input is-danger':'input','placeholder'=>'my-new-category']) !!}--}}
            {{--@if ($errors->has('slug'))--}}
                {{--<span class="help is-danger">--}}
                    {{--{{ $errors->first('slug') }}--}}
                {{--</span>--}}
            {{--@endif--}}
        {{--</p>--}}

        @unless(empty($category->thumbnail))
            <div class="box">
                <figure class="image is-square">
                    <img src="@if(str_contains($category->thumbnail,'placehold.it')){{ $category->thumbnail }}@else{{ asset('storage/'.$category->thumbnail) }}@endif" align="center" style="margin-bottom:10px;">
                    <div class="text-center">
                        {{--{!! Form::button('Delete',['name'=>'thumbnail','class'=>'button is-danger is-small','type'=>'submit']) !!}--}}
                        <a href="#" onclick="document.getElementById('delete-thumb').submit()" class="button is-danger is-small">Delete</a>
                    </div>
                </figure>
            </div>
        @endunless

        {!! Form::label('thumbnail','Thumbnail',['class'=>'label']) !!}
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

<div class="panel @if($errors->has('description')){{ 'is-danger' }}@endif">
    <div class="panel-heading">Summary</div>
    <div class="panel-block">
        {!! Form::label('description','Description',['class'=>'label']) !!}
        <p class="control">
            {!! Form::textarea('description',null,['id'=>'category-description','class'=>$errors->has('description')?'textareais-danger':'textarea','placeholder'=>'Description']) !!}

            @if ($errors->has('description'))
                <span class="help is-danger">
                    {{ $errors->first('description') }}
                </span>
            @endif
        </p>
    </div>
</div>

