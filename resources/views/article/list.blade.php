<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/16/16
 * Time: 6:28 AM
 */
?>
@foreach($articles as $article)
    <div class="row">
        <div class="col-xs-12">
            <h2 class="article-title"><a href="{{ route('article',[$article->slug]) }}">{{ $article->title }}</a> </h2>
        </div>
    </div>
    <div class="row">
        @unless(empty($article->thumbnail))
        <div class="col-xs-3">
            <a href="{{ route('article',[$article->slug]) }}">
                <img src="{{ asset('storage/'.$article->thumbnail) }}" class="img-thumbnail img-article-list" />
            </a>
        </div>
        @endunless
        <div class="col-xs-{{ empty($article->thumbnail)?12:9 }}">
            <div class="text-muted">
                <p>
                    <small>@include('partials.signature',['thing'=>$article])</small>
                </p>
            </div>
            <div class="article-body">
                <p>{!! $article->summary !!} {!! link_to_route('article','more...',[$article->slug]) !!}</p>
            </div>

            <div class="article-tags">
                <p>
                    @foreach($article->tags as $tag)
                        <a class="badge" href="{{ route('tag',[$tag->slug]) }}">
                            <i class="fa fa-tag"></i>
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endforeach

@unless(Route::is('home'))
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@endunless
