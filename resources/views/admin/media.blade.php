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
    Media
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-list-alt"></i></span> Media
    @can('contributor')
        {{ link_to_route('media.create','Create Media',[],['class'=>'button is-primary pull-right']) }}
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
                    <th>Media</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Views</th>
                    <th>Published</th>
                    <th>Created</th>
                </thead>
                <tbody>
                @foreach($medias as $media)
                    <tr>
                        <td>
                            {!! Form::model($media, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\MediaController@destroy',$media]]) !!}
                            {!! Form::button('<i class="fa fa-remove"></i>',['type'=>'submit','class'=>'button is-danger is-small']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td style="width:100px;">
                            <figure class="image is-3by2">
                                <img src="{{ $media->url() }}" class="image">
                            </figure>
                        </td>
                        <td>
                            {{ link_to_route('media.edit',str_limit($media->title,25),[$media]) }}
                        </td>
                        <td>
                            {{ $media->category->name }}
                        </td>
                        <td>
                            {{ $media->description }}
                        </td>
                        <td>
                            {{ number_format($media->views) }}
                        </td>
                        <td>
                            {{ $media->published_at->diffForHumans() }}
                        </td>
                        <td>
                            {{ $media->created_at->toFormattedDateString() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $medias->render() !!}
        </div>
    </div>

@endsection





