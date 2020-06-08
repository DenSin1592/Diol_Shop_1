<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('head')
    </head>
    <body>
        @include('header')
        <div class="content-container">
            @yield('content')
        </div>
        @include('footer')
        @include('js')
    </body>
</html>
