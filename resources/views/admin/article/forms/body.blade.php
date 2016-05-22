<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:37 AM
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            HTML
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            {!! Form::textarea('body',null,['class'=>'form-control editor-html']) !!}
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Script
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group{{ $errors->has('script') ? ' has-error' : '' }}">
            {!! Form::textarea('script',null,['class'=>'form-control editor-script']) !!}
            @if ($errors->has('script'))
                <span class="help-block">
                    <strong>{{ $errors->first('script') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
