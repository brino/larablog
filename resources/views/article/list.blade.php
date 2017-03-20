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
        @unless(empty($article->thumbnailUrl()))
        <figure class="media-left is-hidden-mobile">
            <p class="image is-128x128">
                <a href="{{ route('article',[$article->slug]) }}">
                    <img src="{{ $article->thumbnailUrl() }}" class="image">
                </a>
            </p>
        </figure>
        @endunless

        <div class="media-content">
            <div class="media-heading" style="margin-bottom: 5px;">
                <div class="subtitle">
                    <a href="{{ route('article',[$article->slug]) }}">{{ $article->title }}</a>
                </div>
            </div>
            <p class="is-hidden-desktop">
                @unless(empty($article->thumbnailUrl()))
                <figure class="media-left is-hidden-desktop">
                    <p class="image is-128x128">
                        <a href="{{ route('article',[$article->slug]) }}">
                            <img src="{{ $article->thumbnailUrl() }}" class="image">
                        </a>
                    </p>
                </figure>
                @endunless
            </p>

            <div><small>@include('partials.signature',['thing'=>$article])</small></div>

            <div class="content">
                {!! $article->summary !!}
            </div>

            <nav class="level">
                <div class="level-left">
                    <div class="level-item">
                        @can('update-article',$article)
                            <a href="{{ route('article.edit',[$article]) }}">
                                <span class="icon is-small"><i class="fa fa-pencil"></i></span>
                            </a>
                        @endcan
                        @cannot('update-article',$article)
                            <a href="{{ route('article',[$article]) }}">
                                <span class="icon is-small"><i class="fa fa-file-text"></i></span>
                            </a>
                        @endcannot
                    </div>

                    <div class="level-item">
                        <a href="{{ route('articles',[$article->category]) }}">
                            <span class="icon is-small"><i class="fa {{ $article->category->icon }}"></i></span>
                        </a>
                    </div>

                    @if($article->views)
                        <div class="level-item">
                            <a href="{{ route('article',[$article]) }}">
                                <span class="icon is-small"><i class="fa fa-eye"></i></span>
                                {{ number_format($article->views) }}
                            </a>
                        </div>
                    @endif
                </div>
                <div class="level-right has-text-right">
                    <small>
                        @include('tags.list',['tags' => $article->tags])
                    </small>
                </div>
            </nav>
        </div>
    </article>
@endforeach
