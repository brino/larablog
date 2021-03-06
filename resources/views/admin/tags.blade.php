@extends('layouts.app')


@section('title')
    Tags
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-list-alt"></i></span> Tags
    @can('contributor')
        {{ link_to_route('tag.create','Create Tag',[],['class'=>'button is-primary pull-right']) }}
    @endcan
@stop


@section('content')


    @if($info)
        <div class="notification is-success">
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
                <tr>
                    @can('super')
                    <th></th>
                    @endcan
                    <th>Name</th>
                    <th>Articles</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        @can('super')
                        <td>
                            {!! Form::model($tag, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\TagController@destroy',$tag]]) !!}
                            {!! Form::button('<i class="fa fa-remove"></i>',['type'=>'submit','class'=>'button is-danger is-small']) !!}
                            {!! Form::close() !!}
                        </td>
                        @endcan
                        <td>
                            {{ link_to_route('tag.edit',$tag->name,[$tag]) }}
                        </td>
                        <td>
                            {{ $tag->articles->count() }}
                        </td>
                        <td>
                            {{ $tag->created_at->toFormattedDateString() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $tags->render() !!}
        </div>
    </div>

@endsection




