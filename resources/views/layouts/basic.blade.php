<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    @yield('meta')

    <title>@yield('title') :: {{ env('APP_NAME') }}</title>

    @include('partials.head')
</head>
<body>

<section class="hero is-medium is-primary">
    <div class="hero-head">
        <div class="container">
            @include('navs.header')
        </div>
    </div>
</section>

@include('navs.content')

<div class="container main" id="app">
    @yield('content')
</div>

@include('partials.footer')

</body>
<script src="{{ mix('js/app.js') }}"></script>
@yield('last')
</html>
