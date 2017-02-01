<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ str_replace('www.','',url()->current()) }}">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <title>@yield('title') :: {{ env('APP_NAME') }}</title>

    @include('partials.head')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @if(App::environment('production'))
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '{{ env('APP_ANALYTICS','UA-xxxxxxxxx-x') }}', 'auto');
            ga('send', 'pageview');

        </script>
    @endif
    <link rel="canonical" href="{{ str_replace('www.','',url()->current()) }}" />
</head>
<body>

    <section class="hero is-medium is-primary">
        <div class="hero-head">
            <div class="container">
                @include('partials.nav')
            </div>
        </div>
    </section>

    @if(Route::is('photos') || Route::is('articles') || Route::is('home'))
    <nav class="nav has-shadow" style="z-index:0">
        <div class="container">
            <div class="nav-center">
                <a href="{{ route('articles') }}" class="nav-item is-tab @if(Route::is('articles')){{'is-active'}}@endif">
                    <span class="icon"><i class="fa fa-file-text-o"></i></span>
                    <span class="is-hidden-mobile">Articles</span>
                </a>
                <a href="{{ route('photos') }}" class="nav-item is-tab @if(Route::is('photos')){{'is-active'}}@endif">
                    <span class="icon"><i class="fa fa-file-photo-o"></i></span>
                    <span class="is-hidden-mobile">Photos</span>
                </a>
            </div>
        </div>
    </nav>
    @endif

    <section class="section">
        <div class="container">
            @include('errors.list')
            <h1 class="title"> @yield('heading')</h1>
            @yield('content')
        </div>
    </section>

    @include('partials.footer')

</body>
<script src="{{ mix('js/app.js') }}"></script>
@yield('last')
</html>
