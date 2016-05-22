<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/20/16
 * Time: 5:57 PM
 */
?>

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
    Users
@stop


@section('heading')
    <i class="fa fa-users"></i> Users {{ link_to_route('admin.user.create','Create User',[],['class'=>'btn btn-primary pull-right']) }}
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
                        <th>Email</th>
                        <th>Contributor</th>
                        <th>Super</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {!! Form::model($user, ['id'=>'delete-form','method' => 'DELETE', 'files' => true, 'action' => ['Admin\UserController@destroy',$user]]) !!}
                                {!! Form::submit('x',['class'=>'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {{ link_to_route('admin.user.edit',$user->name,[$user]) }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @if($user->contributor)
                                    <span class="label label-success">Yes</span>
                                @else
                                    <span class="label label-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($user->super)
                                    <span class="label label-success">Yes</span>
                                @else
                                    <span class="label label-danger">No</span>
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                {!! $users->render() !!}
            </div>
        </div>
    </div>

@endsection





