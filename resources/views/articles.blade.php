@extends('layouts.app')


@section('title')
    Articles {{ $filterCategory->name or '' }} {{ request('query') }}
@stop


@section('heading')

    <span class="icon is-medium"><i class="fa fa-search"></i></span> Articles

@stop


@section('content')

    @include('partials.total')

    <div class="columns">
        <div class="column is-three-quarters">
            @include('article.list')
        </div>
        <div class="column">
            @include('category.list')
        </div>
    </div>

@endsection


