<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Opinioni</title>
  <link rel="icon" type="image/icon" href="/favicon.ico">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  @if(config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
  @endif

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="dns-prefetch" href="//code.jquery.com">
  <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
  <link rel="dns-prefetch" href="//stackpath.bootstrapcdn.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
</head>
<body>
<div id="app"></div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
