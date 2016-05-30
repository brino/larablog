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
   <i class="fa fa-dashboard"></i> Dashboard
@stop


@section('content')

    @if($info)
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-info"></i></strong> {{ $info }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 col-md-push-8">
            <h3>Actions</h3>
            <ul class="list-group">

                @can('create-article')
                    <li class="list-group-item">
                        <i class="fa fa-edit"></i> {!! link_to_route('admin.article.create','Create Article') !!}
                    </li>
                @endcan

                @can('create-photo')
                    <li class="list-group-item">
                        <i class="fa fa-camera-retro"></i> {!! link_to_route('admin.photo.create','Create Photo') !!}
                    </li>
                @endcan

                @can('create-category')
                    <li class="list-group-item">
                        <i class="fa fa-hashtag"></i> {!! link_to_route('admin.category.create','Create Category') !!}
                    </li>
                @endcan

                @can('create-tag')
                    <li class="list-group-item">
                        <i class="fa fa-tag"></i> {!! link_to_route('admin.tag.create','Create Tag') !!}
                    </li>
                @endcan

                @can('create-user')
                    <li class="list-group-item">
                        <i class="fa fa-user"></i> {!! link_to_route('admin.user.create','Create User') !!}
                    </li>
                @endcan

            </ul>

            @if(!empty($photos))
            <div class="hidden-xs hidden-sm">
                <h3>Latest Photos</h3>
                <ul class="list-group">
                    @foreach($photos as $photo)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{ route('admin.photo.edit',[$photo]) }}">
                                        <img src="{{ asset('storage/'.$photo->url) }}" class="img-responsive img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><a href="{{ route('admin.photo.edit',[$photo]) }}">{{ $photo->title }}</a></strong></p>
                                    <p>
                                        {{ str_limit($photo->description,25) }}
                                    </p>
                                    <p>
                                        @include('partials.signature',['thing'=>$photo])
                                    </p>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-md-8 col-md-pull-4">
            @if(count($articles))
                <h3>Latest Articles</h3>
                <ul class="list-group">
                    @foreach($articles as $article)
                        <li class="list-group-item">
                            <div><i class="fa fa-file-text-o"></i> {!! link_to_route('admin.article.edit',$article->title,[$article]) !!}</div>
                            <div>@include('partials.signature',['thing'=>$article])</div>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    {!! $articles->render() !!}
                </div>
            @endif
        </div>
    </div>

@endsection


