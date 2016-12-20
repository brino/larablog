<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:37 AM
 */
?>
<div class="panel panel-default @if($errors->has('body')){{ 'is-danger' }}@endif">
    <div class="panel-heading">
        HTML
    </div>
    <div class="panel-block">
        <p class="control">
            {!! Form::textarea('body',null,['class'=>'textarea editor-html']) !!}
            @if ($errors->has('body'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </p>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Script
    </div>
    <div class="panel-block">
        <p class="control">
            {!! Form::textarea('script',null,['class'=>'textarea editor-script']) !!}
            @if ($errors->has('script'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('script') }}</strong>
                </span>
            @endif
        </p>
    </div>
</div>
