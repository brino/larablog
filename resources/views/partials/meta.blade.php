<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ str_replace('www.','',url()->current()) }}">
<meta property="og:site_name" content="{{ env('APP_NAME') }}" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">