<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    @yield('meta')

    <title>@yield('title') :: {{ config('app.name') }}</title>

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
        <section class="section">
            <div class="container">
                {{--@include('errors.list')--}}
                <div class="heading">
                    <h1 class="title">@yield('heading')</h1>
                    @yield('subheading')
                </div>
                <hr>
                @yield('content')
            </div>
        </section>
    </div>


    @include('partials.footer')

</body>
<script src="{{ mix('js/app.js') }}"></script>
@yield('last')
</html>
