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
    <i class="fa fa-list-alt"></i> Articles {{ link_to_route('admin.article.create','Create Article',[],['class'=>'btn btn-primary pull-right']) }}
@stop


@section('content')


    @if($info)
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-info"></i></strong> {{ $info }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Banner</th>
                        <th>Slug</th>
                        {{--<th>Thumbnail</th>--}}
                        <th>Published</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                {!! Form::model($article, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\ArticleController@destroy',$article]]) !!}
                                {!! Form::submit('x',['class'=>'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {{ link_to_route('admin.article.edit',str_limit($article->title,25),[$article]) }}
                            </td>
                            <td>
                                {{ $article->category->name }}
                            </td>
                            <td>
                                {{ $article->banner }}
                            </td>
                            <td>
                                {{ str_limit($article->slug,25) }}
                            </td>
                            <td>

                                <span
                                        @if($article->published_at->gt(\Carbon\Carbon::now()))
                                        class="text-danger"
                                        @else
                                        class="text-success"
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                {!! $articles->render() !!}
            </div>
        </div>
    </div>

@endsection




