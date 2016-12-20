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
                    <img src="{{ asset('storage/'.$article->thumbnail) }}" class="img-thumbnail img-article-list" />
                </a>
            </p>
        </figure>
        @endunless
        <div class="media-content">
            <div class="content">
                <p class="is-hidden-desktop">
                    <figure class="media-left is-hidden-desktop">
                        <p class="image is-4by3">
                            <a href="{{ route('article',[$article->slug]) }}">
                                <img src="{{ asset('storage/'.$article->thumbnail) }}" class="img-thumbnail img-article-list" />
                            </a>
                        </p>
                    </figure>
                </p>
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
                        <a class="level-item" href="{{ route('articles',[null,'query'=>$tag->slug]) }}">
                            <span class="icon is-small"><i class="fa fa-tag"></i></span>
                            {{ $tag->name }}
                        </a>
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
