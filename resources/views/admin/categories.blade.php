<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 7:33 AM
 */
?>

@extends('layouts.app')


@section('title')
    Categories
@stop


@section('heading')
    <i class="fa fa-list-alt"></i> Categories {{ link_to_route('category.create','Create Category',[],['class'=>'btn btn-primary pull-right']) }}
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Articles</th>
                            <th>Photos</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {!! Form::model($category, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\CategoryController@destroy',$category]]) !!}
                                    {!! Form::submit('x',['class'=>'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {{ link_to_route('category.edit',$category->name,[$category]) }}
                                </td>
                                <td>
                                    {{ $category->slug }}
                                </td>
                                <td>
                                    {{ $category->articles->count() }}
                                </td>
                                <td>
                                    {{ $category->photos->count() }}
                                </td>
                                <td>
                                    {{ $category->created_at->toFormattedDateString() }}
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
                {!! $categories->render() !!}
            </div>
        </div>
    </div>

@endsection



