@extends('layouts.app')


@section('title')
    Latest Articles
@stop


@section('heading')
    <span class="fa fa-feed"></span> Latest Articles
@stop


@section('content')

    @include('article.list')

@endsection
