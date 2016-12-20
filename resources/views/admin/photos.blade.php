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
    Photos
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-list-alt"></i></span> Photos
    @can('create-photo')
        {{ link_to_route('photo.create','Create Photo',[],['class'=>'button is-primary pull-right']) }}
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
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    {{--<th>Url</th>--}}
                    {{--<th>Slug</th>--}}
                    <th>Views</th>
                    <th>Published</th>
                    <th>Created</th>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>
                            {!! Form::model($photo, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\PhotoController@destroy',$photo]]) !!}
                            {!! Form::submit('x',['class'=>'button is-danger is-small']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td style="width:100px;">
                            <img src="{{ asset('storage/'.$photo->url) }}" class="img-responsive">
                        </td>
                        <td>
                            {{ link_to_route('photo.edit',str_limit($photo->title,25),[$photo]) }}
                        </td>
                        <td>
                            {{ $photo->category->name }}
                        </td>
                        <td>
                            {{ $photo->description }}
                        </td>
                        {{--<td>--}}
                            {{--{{ $photo->url }}--}}
                        {{--</td>--}}
                        {{--<td>--}}
                            {{--{{ str_limit($photo->slug,25) }}--}}
                        {{--</td>--}}
                        <td>
                            {{ number_format($photo->views) }}
                        </td>
                        <td>
                            {{ $photo->published_at->diffForHumans() }}
                        </td>
                        <td>
                            {{ $photo->created_at->toFormattedDateString() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $photos->render() !!}
        </div>
    </div>

@endsection





