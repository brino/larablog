<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:58 PM
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        User
    </div>
    <div class="panel-block">
        {!! Form::label('name','Name',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('name',null,['class'=>$errors->has('name')?'input is-danger':'input','placeholder'=>'My New Category']) !!}
            @if ($errors->has('name'))
                <span class="help is-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </p>

        {!! Form::label('email','Email',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('email',null,['class'=>$errors->has('email')?'input is-danger':'input','placeholder'=>'email@domain.com']) !!}
            @if ($errors->has('email'))
                <span class="help is-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </p>

        {!! Form::label('contributor','Contributor',['class'=>'label']) !!}
        <p class="control">
            <span class="select">
                {!! Form::select('contributor',['0'=>'No','1'=>'Yes'],$user->contributor) !!}
            </span>
            @if ($errors->has('contributor'))
                <span class="help is-danger">
                <strong>{{ $errors->first('contributor') }}</strong>
            </span>
            @endif
        </p>

        {!! Form::label('super','Super',['class'=>'label']) !!}
        <p class="control">
            <span class="select">
                {!! Form::select('super',['0'=>'No','1'=>'Yes'],$user->super) !!}
            </span>
            @if ($errors->has('super'))
                <span class="help is-danger">
                <strong>{{ $errors->first('super') }}</strong>
            </span>
            @endif
        </p>

        {!! Form::label('password','Password',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('password',null,['class'=>$errors->has('password')?'input is-danger':'input','placeholder'=>'password']) !!}
            @if ($errors->has('password'))
                <span class="help is-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </p>
    </div>
</div>

