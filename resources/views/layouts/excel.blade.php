<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=" . $title . ".xls");
?>
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
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title'){{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/azia.css') }}">
    <style>
        td{
            white-space: nowrap!important;
        }
    </style>
    @stack('styles')
</head>
<body>
@yield('content')
@stack('modals')

<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/azia.js') }}"></script>
<script>

</script>
@stack('scripts')
</body>
</html>
