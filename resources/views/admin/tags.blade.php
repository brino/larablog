<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 11:31 AM
 */
?>
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
    Tags
@stop


@section('heading')
    <i class="fa fa-list-alt"></i> Tags {{ link_to_route('admin.tag.create','Create Tag',[],['class'=>'btn btn-primary pull-right']) }}
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
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {!! Form::model($tag, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\TagController@destroy',$tag]]) !!}
                                {!! Form::submit('x',['class'=>'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {{ link_to_route('admin.tag.edit',$tag->name,[$tag]) }}
                            </td>
                            <td>
                                {{ $tag->slug }}
                            </td>
                            <td>
                                {{ $tag->created_at->toFormattedDateString() }}
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
                {!! $tags->render() !!}
            </div>
        </div>
    </div>

@endsection




