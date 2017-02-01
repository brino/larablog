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
        Body (HTML)
    </div>
    <div class="panel-block">
        <p class="control">
            {!! Form::textarea('body',null,['id'=>'article-body','class'=>'textarea editor-html']) !!}
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
            {!! Form::textarea('script',null,['id'=>'article-script','class'=>'textarea editor-script']) !!}
            @if ($errors->has('script'))
                <span class="help is-danger">
                    <strong>{{ $errors->first('script') }}</strong>
                </span>
            @endif
        </p>
    </div>
</div>
