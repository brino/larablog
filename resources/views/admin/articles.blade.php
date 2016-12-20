<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 9:31 AM
 */
?>

@extends('layouts.app')


@section('title')
    Articles
@stop


@section('heading')
    <span class="icon"><i class="fa fa-list-alt"></i></span> Articles
    @can('create-article')
        {{ link_to_route('article.create','Create Article',[],['class'=>'button is-primary pull-right']) }}
    @endcan
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
            <table class="table">
                <thead>
                    <th></th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    {{--<th>Slug</th>--}}
                    <th>Views</th>
                    <th>Published</th>
                    <th>Created</th>
                    {{--<th>Updated</th>--}}
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            {!! Form::model($article, ['id'=>'delete-form','method' => 'DELETE', 'action' => ['Admin\ArticleController@destroy',$article]]) !!}
                            {!! Form::submit('x',['class'=>'button is-danger is-small']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {{ link_to_route('article.edit',str_limit($article->title,25),[$article]) }}
                        </td>
                        <td>
                            {{ $article->category->name }}
                        </td>
                        <td>
                            <p>
                                @foreach($article->tags as $tag)
                                    <a class="badge" href="{{ route('articles',[null,'query'=>$tag->slug]) }}">
                                        <i class="fa fa-tag"></i>
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </p>
                        </td>
                        {{--<td>--}}
                            {{--{{ str_limit($article->slug,25) }}--}}
                        {{--</td>--}}
                        <td class="text-right">
                            {{ number_format($article->views) }}
                        </td>
                        <td>

                            <span
                                    @if($article->published_at->gt(\Carbon\Carbon::now()))
                                    class="is-danger"
                                    @else
                                    class="is-success"
                                    @endif
                            >
                                {{ $article->published_at->diffForHumans() }}

                            </span>
                        </td>
                        <td>
                            {{ $article->created_at->toFormattedDateString() }}
                        </td>
                        {{--<td>--}}
                            {{--{{ $article->updated_at->toFormattedDateString() }}--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $articles->render() !!}
        </div>
    </div>


@endsection




