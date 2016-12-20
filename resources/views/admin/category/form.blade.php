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
        <div class="container">
            {!! Form::label('name','Name',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('name',null,['class'=>$errors->has('name')?'input is-danger':'input','placeholder'=>'My New Category']) !!}
                @if ($errors->has('name'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </p>
        </div>
        <div class="container">
            {!! Form::label('slug','Slug',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('slug',null,['class'=>$errors->has('slug')?'input is-danger':'input','placeholder'=>'my-new-category']) !!}
                @if ($errors->has('slug'))
                    <span class="help is-danger">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </p>
        </div>
    </div>
</div>

