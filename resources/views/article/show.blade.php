@extends('layouts.hero')

@section('meta')
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->summary }}">
    <meta property="og:image" content="{{ asset('storage/'.$article->thumbnail) }}">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">
    <meta name="description" content="{{ $article->summary }}"/>
@stop

@section('title')
    {{ $article->title }}
@stop

@section('heading')
    <span class="icon is-medium"><i class="fa {{ $article->category->icon }}"></i></span> {{ $article->title }}
@stop

@section('subheading')
    @include('partials.signature',['thing'=>$article])
@endsection

@section('content')


    <div class="container">
       @unless(empty($article->bannerUrl()))
        <figure class="image" style="margin-bottom: 20px;">
            <img src="{{ $article->bannerUrl() }}" class="image">
        </figure>
        @endunless

        <p>
            <small>@component('tags.list',['tags'=>$article->tags])@endcomponent</small>
        </p>

        <div class="content" style="margin-top: 20px;margin-bottom:20px;">
            {!! $article->body !!}
        </div>
    </div>
    <div class="container">
        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
             */

             var disqus_config = function () {
             this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
             this.page.identifier = '{{ $article->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
             };

            (function() {  // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');

                s.src = '//brianmix.disqus.com/embed.js';

                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
    </div>

@endsection


@section('last')
    <script src="{{ mix('js/article.js') }}"></script>
    <script id="dsq-count-scr" src="//brianmix.disqus.com/count.js" async></script>
@stop