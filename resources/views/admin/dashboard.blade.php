<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/17/16
 * Time: 12:03 PM
 */
?>

@extends('layouts.app')


@section('title')
    Admin
@stop


@section('heading')
   <span class="icon is-medium"><i class="fa fa-dashboard"></i></span> Dashboard
@stop


@section('content')

    @if($info)
        <div class="notification is-success">
            {{--<button class="delete"></button>--}}
            <span class="icon"><i class="fa fa-info"></i></span> {{ $info }}
        </div>
    @endif

    <div class="columns">
        <div class="column is-2">
            @include('partials.admin-nav')
        </div>
        <div class="column">
            <div class="tile is-ancestor">
                <div class="tile is-vertical">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification">
                                <p class="title">Articles</p>
                                <p class="subtitle">Stats on my articles</p>
                                <div class="content">
                                    <div class="level">
                                        <div class="level-item has-text-centered">
                                            <p class="heading">Published</p>
                                            <p class="title">{{ $articles->published()->count() }}</p>
                                        </div>
                                        <div class="level-item has-text-centered">
                                            <p class="heading">Unpublished</p>
                                            <p class="title">{{ $articles->unpublished()->count() }}</p>
                                        </div>
                                        <div class="level-item has-text-centered">
                                            <p class="heading">Views</p>
                                            <p class="title">{{ Auth::user()->articles()->sum('views') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="tile is-child notification">
                                <p class="title">Media</p>
                                <p class="subtitle">Stats on my media</p>
                                <div class="content">
                                    <div class="level">
                                        <div class="level-item has-text-centered">
                                            <p class="heading">Published</p>
                                            <p class="title">{{ $medias->published()->count() }}</p>
                                        </div>
                                        <div class="level-item has-text-centered">
                                            <p class="heading">Unpublished</p>
                                            <p class="title">{{ $medias->unpublished()->count() }}</p>
                                        </div>
                                        <div class="level-item has-text-centered">
                                            <p class="heading">Views</p>
                                            <p class="title">{{ Auth::user()->media()->sum('views') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child notification">
                                <p class="title">Most Popular</p>
                                <p class="subtitle">View count by article</p>
                                <div class="container">
                                    <table class="table">
                                        <thead>
                                            <th>Views</th>
                                            <th>Title</th>
                                        </thead>
                                        <tbody>
                                        @foreach($popular as $article)
                                            <tr>
                                                <td class="has-text-centered">{{ $article->views }}</td>
                                                <td><a href="{{ route('article',$article->slug) }}">{{ $article->title }}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child notification">
                            <p class="title">Categories</p>
                            <p class="subtitle">Contribution count by category</p>
                            <div class="content">
                                <div class="level">
                                    @foreach($categories as $name=>$category)
                                        <div class="level-item has-text-centered">
                                            <p class="heading">{{ $name }}</p>
                                            <p class="title">{{$category }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


