@extends('layouts.app')


@section('title')
    Articles {{ $category->name or '' }} {{ request('query') }}
@stop


@section('heading')


    @if($category->exists)
        <span class="icon is-medium"><i class="fa {{ $category->icon }}"></i></span>
        {{ $category->name }}
    @else
        <span class="icon is-medium"><i class="fa fa-search"></i></span>
        {{ 'Articles' }}
    @endif

@stop

@section('subheading')
    @unless(empty($category->description))
         <h2 class="subtitle">{{ $category->description }}</h2>
    @endunless
@endsection


@section('content')

    @include('partials.total')

    @include('article.list')

    @if(method_exists($articles,'render'))
        <div class="container" style="margin-top: 20px;">
            {!! $articles->render() !!}
        </div>
    @endif

@endsection


