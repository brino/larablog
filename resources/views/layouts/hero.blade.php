<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    @yield('meta')

    @component('partials.title')
        @unless(empty($title))
            {{ $title }}
        @endunless
    @endcomponent

    @include('partials.head')
</head>
<body>
    @include('navs.header')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="is-vcentered">
                    <h1 class="title">@yield('heading')</h1>
                    <h2 class="subtitle" style="margin-left: 20px;">@yield('subheading')</h2>
                </div>
            </div>
        </div>
    </section>

    @include('navs.content')

    <div class="container" id="app">
        <section class="section">
            <div class="container">
                {{--@include('errors.list')--}}
                {{--<div class="heading">--}}
                    {{--<h1 class="title">@yield('heading')</h1>--}}
                    {{--@yield('subheading')--}}
                {{--</div>--}}
                {{--<hr>--}}
                @yield('content')
            </div>
        </section>
    </div>


    @include('partials.footer')

</body>
<script src="{{ mix('js/app.js') }}"></script>
@yield('last')
</html>
