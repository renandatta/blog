<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image" content="{{ asset('img/favicon.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/favicon.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="author" content="Adtek">

    <title>@yield('title'){{ env('APP_NAME') }}</title>

    <link href="{{ asset('lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/typicons.font/typicons.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/azia.css') }}">
    <style>
        .az-card-signin{
            height: auto;
        }
    </style>
</head>
<body class="az-body">

@yield('content')

<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/ionicons/ionicons.js') }}"></script>

<script src="{{ asset('js/azia.js') }}"></script>
<script>
    $(function(){
        'use strict'

    });
</script>
</body>
</html>
