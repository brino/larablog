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
    <span class="icon is-medium"><i class="fa fa-list-alt"></i></span>
    Categories
    @can('super')
        {{ link_to_route('category.create','Create Category',[],['class'=>'button is-primary pull-right']) }}
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
                    @can('super')
                    <th></th>
                    @endcan
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Articles</th>
                    <th>Photos</th>
                    <th>Created</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            @can('super')
                            <td>
                                {!! Form::model($category, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\CategoryController@destroy',$category]]) !!}
                                {!! Form::button('',['type'=>'submit','class'=>'fa fa-remove button is-danger is-small']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endcan
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
            {!! $categories->render() !!}
        </div>
    </div>

@endsection



