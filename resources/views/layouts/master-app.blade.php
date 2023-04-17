<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Muhammad Awaludin">
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet">
</head>

<body>

    @include('layouts.components.navbar')

    <!-- Main Content -->
    <main class="main">
        @yield('content')
    </main>

    <script src="{!! asset('assets/js/bootstrap.bundle.min.js') !!}"></script>
</body>

</html>