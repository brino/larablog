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

<div class="container">
    <div class="page-heading">
        <h1 class="page-header"> @yield('heading')</h1>
    </div>
</div>

<div class="container" id="content-main">
    @include('errors.list')
    @yield('content')
</div>

<footer class="footer @if(env('APP_DARK',false)){{'dark'}}@endif">
    <div class="container">
            <ul class="list-inline text-center" id="social-icons">
                <li>
                    @if(env('APP_GIT',false))
                        <a href="https://github.com/{{ env('APP_GIT') }}"><i class="fa fa-3x fa-github-alt" aria-hidden="true"></i></a>
                    @endif
                </li>
                <li>
                    @if(env('APP_FACE',false))
                        <a href="https://facebook.com/{{ env('APP_FACE') }}"><i class="fa fa-3x fa-facebook" aria-hidden="true"></i></a>
                    @endif
                </li>
                <li>
                    @if(env('APP_TWIT',false))
                        <a href="https://twitter.com/{{ env('APP_TWIT') }}"><i class="fa fa-3x fa-twitter" aria-hidden="true"></i></a>
                    @endif
                </li>
                <li>
                    @if(env('APP_GPLUS',false))
                        <a href="https://plus.google.com/+{{ env('APP_GPLUS') }}"><i class="fa fa-3x fa-google-plus" aria-hidden="true"></i></a>
                    @endif
                </li>
                <li>
                    @if(env('APP_UTUBE',false))
                        <a href="https://youtube.com/channel/{{ env('APP_UTUBE') }}"><i class="fa fa-3x fa-youtube" aria-hidden="true"></i></a>
                    @endif
                </li>
                <li>
                    @if(env('APP_LINKEDIN',false))
                        <a href="https://www.linkedin.com/in/{{ env('APP_LINKEDIN') }}"><i class="fa fa-3x fa-linkedin" aria-hidden="true"></i></a>
                    @endif
                </li>
            </ul>

            <div class="row">
                <p class="text-center">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> {{ date('Y') }} {{ env('APP_COPY') }}</p>
            </div>
    </div>
</footer>
<div class="last">
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('last')
</div>
</body>
</html>
