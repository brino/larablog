@extends('layouts.basic')


@section('title')
    Latest
@stop

@section('meta')
    <meta property="og:title" content="Latest Articles">
    <meta property="og:description" content="Latest web development, technology, outdoors related articles for {{ env('APP_NAME') }}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">
    <meta name="description" content="Latest web development, technology, outdoors related articles for {{ env('APP_NAME') }}"/>
@stop

@section('content')

    <div class="columns">
        <div class="column is-two-thirds">

            @if($popular->count())
            <section class="section">
                <div class="container">
                    <div class="heading">
                        <h1 class="title"><span class="icon is-medium"><i class="fa fa-feed"></i></span> Popular</h1>
                    </div>
                    <hr>
                    @component('article.list',['articles'=>$popular])@endcomponent
                </div>
            </section>
            @endif
            <section class="section">
                <div class="contianer">
                    <div class="heading">
                        <h1 class="title"><span class="icon is-medium"><i class="fa fa-feed"></i></span> Latest</h1>
                    </div>
                    <hr>
                    @component('article.list',['articles'=>$latest])@endcomponent
                </div>
            </section>
        </div>
        <div class="column">
            <section class="section">
                <div class="container">
                    <div class="heading">
                        <h1 class="title"><span class="icon is-medium"><i class="fa fa-camera-retro"></i></span> Media</h1>
                    </div>
                    <hr>
                    <div style="margin-left:23px;">
                        @include('media.list')
                        <div style="clear:both;"></div>
                    </div>


                </div>
            </section>
        </div>
    </div>

@endsection
