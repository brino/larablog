@extends('layouts.app')


@section('title')
    Users
@stop


@section('heading')
    <span class="icon is-medium"><i class="fa fa-users"></i></span> Users
    @can('super')
        {{ link_to_route('user.create','Create User',[],['class'=>'button is-primary pull-right']) }}
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Articles</th>
                    <th>Media</th>
                    <th class="has-text-centered">Contributor</th>
                    <th class="has-text-centered">Super</th>
                    <th>Created</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {!! Form::model($user, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\UserController@destroy',$user]]) !!}
                            {!! Form::button('<i class="fa fa-remove"></i>',['type'=>'submit','class'=>'button is-danger is-small']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {{ link_to_route('user.edit',$user->name,[$user]) }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->articles->count() }}
                        </td>
                        <td>
                            {{ $user->media->count() }}
                        </td>
                        <td class="has-text-centered">
                            @if($user->contributor)
                                <span class="tag is-success">Yes</span>
                            @else
                                <span class="tag is-danger">No</span>
                            @endif
                        </td>
                        <td class="has-text-centered">
                            @if($user->super)
                                <span class="tag is-success">Yes</span>
                            @else
                                <span class="tag is-danger">No</span>
                            @endif
                        </td>
                        <td>
                            @unless(empty($user->created_at))
                            {{ $user->created_at->toFormattedDateString() }}
                            @endunless
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->render() !!}
        </div>
    </div>

@endsection





