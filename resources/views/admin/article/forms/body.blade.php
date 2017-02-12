<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/18/16
 * Time: 8:37 AM
 */
?>
<div class="panel @if($errors->has('body')){{ 'is-danger' }}@endif">
    <div class="panel-heading">
        Body (HTML)
    </div>
    <div class="panel-block">
        <p class="control">
            {{--{!! Form::textarea('body',null,['id'=>'article-body','class'=>'textarea editor-html']) !!}--}}
            <html-editor name="body" value="{{ $article->body or old('body') }}"></html-editor>
            @if ($errors->has('body'))
                <span class="help is-danger">
                    {{ $errors->first('body') }}
                </span>
            @endif
        </p>
    </div>
</div>

<div class="panel @if($errors->has('script')){{ 'is-danger' }}@endif">
    <div class="panel-heading">
        Script
    </div>
    <div class="panel-block">
        <p class="control">
            {{--{!! Form::textarea('script',null,['id'=>'article-script','class'=>'textarea editor-script']) !!}--}}
            <js-editor name="script" value="{{ $article->script or old('script') }}"></js-editor>
            @if ($errors->has('script'))
                <span class="help is-danger">
                    {{ $errors->first('script') }}
                </span>
            @endif
        </p>
    </div>
</div>
