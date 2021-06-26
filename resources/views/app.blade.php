<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vue Laravel SPA') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div id = "nav">
      <navbar></navbar>
      <a href="/login">login</a>
      @can('all')
      <form action="/logout" method="POST">@csrf<button type="submit">logout</button></form>
      @endcan
      @can('admin')
      <router-view role="{{ Auth::user()->role }}"/>
      @else
      <router-view/>
      @endcan
      
    </div>
</div>
<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>