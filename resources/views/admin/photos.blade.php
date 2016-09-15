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
    <i class="fa fa-list-alt"></i> Photos {{ link_to_route('photo.create','Create Photo',[],['class'=>'btn btn-primary pull-right']) }}
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
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        {{--<th>Url</th>--}}
                        <th>Slug</th>
                        <th>Views</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>
                                {!! Form::model($photo, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\PhotoController@destroy',$photo]]) !!}
                                {!! Form::submit('x',['class'=>'btn btn-danger btn-xs']) !!}
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
                            <td>
                                {{ str_limit($photo->slug,25) }}
                            </td>
                            <td>
                                {{ number_format($photo->views) }}
                            </td>
                            <td>
                                {{ $photo->created_at->toFormattedDateString() }}
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
                {!! $photos->render() !!}
            </div>
        </div>
    </div>

@endsection





