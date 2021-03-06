<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:58 PM
 */
?>

<div class="panel">
    <div class="panel-heading">
        User
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

        {!! Form::label('email','Email',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('email',null,['class'=>$errors->has('email')?'input is-danger':'input','placeholder'=>'email@domain.com']) !!}
            @if ($errors->has('email'))
                <span class="help is-danger">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </p>
        @can('super')
            <div class="columns">
                <div class="column is-one-quarter">
                    {!! Form::label('contributor','Contributor',['class'=>'label']) !!}
                    <p class="control">
                        <span class="select">
                            {!! Form::select('contributor',['0'=>'No','1'=>'Yes'],$user->contributor) !!}
                        </span>
                        @if ($errors->has('contributor'))
                            <span class="help is-danger">
                        {{ $errors->first('contributor') }}
                    </span>
                        @endif
                    </p>
                </div>
                <div class="column is-one-quarter">
                    {!! Form::label('super','Super',['class'=>'label']) !!}
                    <p class="control">
                        <span class="select">
                            {!! Form::select('super',['0'=>'No','1'=>'Yes'],$user->super) !!}
                        </span>
                        @if ($errors->has('super'))
                            <span class="help is-danger">
                                {{ $errors->first('super') }}
                            </span>
                        @endif
                    </p>
                </div>
                <div class="column is-half">
                    {!! Form::label('avatar','Avatar',['class'=>'label']) !!}
                    <p class="control has-icon">
                        <upload name="avatar" value="{{ $user->avatar }}"></upload>
                        @if ($errors->has('avatar'))
                            <span class="help is-danger">
                                {{ $errors->first('avatar') }}
                            </span>
                        @endif
                    </p>

                </div>
            </div>

            {!! Form::label('new_password','Change Password',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('new_password',null,['class'=>$errors->has('new_password')?'input is-danger':'input','placeholder'=>'New Password']) !!}
                @if ($errors->has('new_password'))
                    <span class="help is-danger">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
                @endif
            </p>

            {!! Form::label('verify_password','Verify Password',['class'=>'label']) !!}
            <p class="control">
                {!! Form::text('verify_password',null,['class'=>$errors->has('verify_password')?'input is-danger':'input','placeholder'=>'Verify Password']) !!}
                @if ($errors->has('verify_password'))
                    <span class="help is-danger">
                    <strong>{{ $errors->first('verify_password') }}</strong>
                </span>
                @endif
            </p>
        @endcan

        {!! Form::label('bio','Bio',['class'=>'label']) !!}
        <p class="control">
            {!! Form::textarea('bio',null,['class'=>$errors->has('bio')?'textarea is-danger':'textarea','placeholder'=>'My Bio']) !!}
            @if ($errors->has('bio'))
                <span class="help is-danger">
                    {{ $errors->first('bio') }}
                </span>
            @endif
        </p>
    </div>
</div>

