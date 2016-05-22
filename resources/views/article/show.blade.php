<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/15/16
 * Time: 3:19 PM
 */
?>

@extends('layouts.app')


@section('title')
    {{ $article->title }}
@stop


@section('heading')
    <span class="fa fa-file-text-o"></span> {{ $article->title }}
@stop


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <p class="pull-right">
                @foreach($article->tags as $tag)
                    <span class="badge">{{ $tag->name }}</span>
                @endforeach
            </p>
            <p class="text-muted">
                @include('partials.signature',['thing'=>$article])
                on {{ $article->published_at->toFormattedDateString() }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
           @unless(empty($article->banner))
            <p>
                <img src="{{ asset('storage/'.$article->banner) }}" class="img-responsive img-rounded" id="img-article" />
            </p>
            @endunless
            <p>
                {!! $article->body !!}
            </p>
        </div>
    </div>

@endsection


