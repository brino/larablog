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
    <span class="icon is-medium"><i class="fa fa-list-alt"></i></span> Articles
    @can('contributor')
        {{ link_to_route('article.create','Create Article',[],['class'=>'button is-primary pull-right']) }}
    @endcan
@stop


@section('content')


    @include('partials.info')

    <div class="columns">
        <div class="column is-2">
            @include('partials.admin-nav')
        </div>
        <div class="column">
            <table class="table">
                <thead>
                    <th></th>
                    <th>Title</th>
                    @can('super')
                    <th>Contributor</th>
                    @endcan
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Views</th>
                    <th>Published</th>
                    <th>Created</th>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            {!! Form::model($article, ['id'=>'delete-form','method' => 'DELETE', 'action' => ['Admin\ArticleController@destroy',$article]]) !!}
                            {!! Form::button('<i class="fa fa-remove"></i>',['type'=>'submit','class'=>'button is-danger is-small']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {{ link_to_route('article.edit',str_limit($article->title,25),[$article]) }}
                        </td>
                        @can('super')
                        <td>
                            <a href="{{ route('profile',$article->user) }}">{{ $article->user->name }}</a>
                        </td>
                        @endcan
                        <td>
                            {{ $article->category->name }}
                        </td>
                        <td>
                            <p>
                                <small>
                                    @component('tags.list',['tags' => $article->tags])@endcomponent
                                </small>
                            </p>
                        </td>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $articles->render() !!}
        </div>
    </div>


@endsection




