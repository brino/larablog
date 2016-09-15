<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/3/16
 * Time: 1:27 PM
 */
?>
<nav class="navbar @if(env('APP_DARK',false)){{'navbar-inverse'}}@else{{'navbar-default'}}@endif navbar-main navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">

                <span class="icon-brand">
                    @if(!env('APP_LOGO',false))
                        <i class="fa fa-signal"></i>
                    @else
                        <img src="{{ asset('img/'.env('APP_LOGO')) }}" id="logo" title="{{ env('APP_NAME') }}">
                    @endif
                    {{ env('APP_NAME','sitename') }}
                </span>

            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    {!! Form::open(['route'=>'articles','method'=>'GET','class'=>'form-inline']) !!}
                    {{--{{ csrf_field() }}--}}
                    <div id="form-div" class="form-inline">
                        <div class="input-group">
                            {!! Form::text('query',request('query'),['class'=>'form-control dark','placeholder'=>'search','id'=>'search']) !!}
                            <div class="input-group-addon" id="do-search"><i class="fa fa-search"></i></div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="{{ route('articles') }}"><i class="fa fa-file-text"></i> <span class="hidden-sm">Articles</span></a></li>
                <li><a href="{{ route('photos') }}"><i class="fa fa-file-photo-o"></i> <span class="hidden-sm">Photos</span></a></li>
                <li><a href="{{ route('about') }}"><i class="fa fa-info-circle"></i> <span class="hidden-sm">About</span></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    @if(env('APP_REGISTER',false))
                    <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> <span class="hidden-sm">Login</span></a></li>
                    <li><a href="{{ url('/register') }}"><i class="fa fa-user"></i> <span class="hidden-sm">Register</span></a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i> <span class="hidden-sm">{{ Auth::user()->name }}</span> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            @can('create-article')
                                <li><a href="{{ route('article.index') }}"><i class="fa fa-edit"></i> Articles</a></li>
                            @endcan
                            @can('create-photo')
                                <li><a href="{{ route('photo.index') }}"><i class="fa fa-camera-retro"></i> Photos</a></li>
                            @endcan
                            @can('create-category')
                                <li><a href="{{ route('category.index') }}"><i class="fa fa-hashtag"></i> Categories</a></li>
                            @endcan
                            @can('create-tag')
                                <li><a href="{{ route('tag.index') }}"><i class="fa fa-tags"></i> Tags</a></li>
                            @endcan
                            @can('create-user')
                                <li><a href="{{ route('user.index') }}"><i class="fa fa-users"></i> Users</a></li>
                            @endcan

                            <li>
                                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>