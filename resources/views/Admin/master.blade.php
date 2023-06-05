<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>وبسایت آموزشی وب لرن</title>

    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
</head>

<body>

<div id="app">
    @include('Admin.section.header')

    @yield('content')

</div>

@include('Admin.section.footer')

<script src="/js/sweetalert.min.js"></script>

@include('sweet::alert')
</body>
</html>
