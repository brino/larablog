<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 6:28 AM
 */
?>
@foreach($articles as $article)
    <article class="media">
        @unless(empty($article->thumbnail))
        <figure class="media-left is-hidden-mobile">
            <p class="image is-128x128">
                <a href="{{ route('article',[$article->slug]) }}">
                    <img src="@if(str_contains($article->thumbnail,'placehold.it')){{ $article->thumbnail }}@else{{ asset('storage/'.$article->thumbnail) }}@endif" class="img-thumbnail img-article-list" />
                </a>
            </p>
        </figure>
        @endunless
        <div class="media-content">

            <p class="is-hidden-desktop">
                <figure class="media-left is-hidden-desktop">
                    <p class="image is-4by3">
                        <a href="{{ route('article',[$article->slug]) }}">
                            <img src="@if(str_contains($article->thumbnail,'placehold.it')){{ $article->thumbnail }}@else{{ asset('storage/'.$article->thumbnail) }}@endif" class="img-thumbnail img-article-list" />
                        </a>
                    </p>
                </figure>
            </p>
            <div class="content">
                <p>
                    <strong><a href="{{ route('article',[$article->slug]) }}">{{ $article->title }}</a></strong>
                </p>
                {!! $article->summary !!}
            </div>
            <nav class="level">
                <div class="level-left">
                    <small>@include('partials.signature',['thing'=>$article])</small>
                </div>
                <div class="level-right">
                    <small>
                    @foreach($article->tags as $tag)
                        <span class="level-item">
                            <span class="tag @if(collect(request('tags'))->search($tag->slug)!==false){{ 'is-primary' }}@endif">
                                <a
                                    @if(collect(request('tags'))->search($tag->slug)===false)
                                        href="{!! route('articles',['category'=>!empty($filterCategory)?$filterCategory->slug:null,'query'=>request('query'),'tags'=>collect(request('tags'))->merge($tag->slug)->toArray()]) !!}"
                                    @else
                                        style="color:white;"
                                        href="{!! route('articles',['category'=>$filterCategory?$filterCategory->slug:null,'query'=>request('query'),'tags'=>collect(request('tags'))->filter(function($requestTag) use($tag) {return $requestTag!=$tag->slug;})->toArray()]) !!}"
                                    @endif
                                >

                                    <span class="icon is-small"><i class="fa fa-tag"></i></span>
                                    {{ $tag->name }}
                                    @if(collect(request('tags'))->search($tag->slug)!==false)
                                        <span class="delete is-small"></span>
                                    @endif
                                </a>
                            </span>
                        </span>
                    @endforeach
                    </small>
                </div>
            </nav>
        </div>
        {{--<div class="media-right">--}}
            {{--<button class="delete"></button>--}}
        {{--</div>--}}
    </article>

@endforeach

@if(method_exists($articles,'render'))
    <div class="container" style="margin-top: 20px;">
        {!! $articles->render() !!}
    </div>
@endif
