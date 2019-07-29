<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="generator" content="Jekyll v3.8.5">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Test laravel') }}</title>

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
        <!-- Bootstrap styles for this template -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        </script>
    </head>
    <body>
        @include('layouts.header')

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    @yield('content')

                </div><!-- /.blog-main -->
                <aside class="col-md-4 blog-sidebar">
                    @include('layouts._sidebar')
                </aside><!-- /.blog-sidebar -->
            </div><!-- /.row -->

        </main><!-- /.container -->
        @include('layouts.footer')
    </body>
</html>
