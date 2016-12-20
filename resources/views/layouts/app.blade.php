<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/3/16
 * Time: 1:26 PM
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 4/12/16
 * Time: 10:00 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ str_replace('www.','',url()->current()) }}">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    @yield('meta')

    <title>@yield('title') :: {{ env('APP_NAME') }}</title>

    @include('partials.head')
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

    @include('partials.nav')
    @if(Route::is('photos') || Route::is('articles') || Route::is('home'))
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-center">
                <a href="{{ route('articles') }}" class="nav-item is-tab @if(Route::is('articles')){{'is-active'}}@endif">
                    <span class="icon"><i class="fa fa-file-text"></i></span>
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
<script src="{{ asset('js/app.js') }}"></script>
@yield('last')
</html>
