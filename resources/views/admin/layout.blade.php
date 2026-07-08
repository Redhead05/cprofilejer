<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'LAW FIRM')</title>
    <!-- Styles -->
    @include('admin.partials.styles')
</head>
<body class="boxed-size">
@include('admin.partials.preloader')
@include('admin.partials.sidebar')

<div class="container-fluid">
    <div class="main-content d-flex flex-column">
        <!-- Start Header Area -->
        @include('admin.partials.header')
        <!-- End Header Area -->

        {{--        yield--}}
        <main class="container">
            @yield('content')
        </main>

        <div class="flex-grow-1"></div>
        <!-- Start Footer Area -->
        @include('admin.partials.footer')
        <!-- End Footer Area -->
    </div>
</div>


@include('admin.partials.theme_settings')
@include('admin.partials.scripts')
</body>
</html>
