<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 5/3/16
 * Time: 1:26 PM
 */
?>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
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