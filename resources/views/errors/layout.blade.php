<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.shared.partials.meta')
        @yield('title')
        @include('backend.shared.partials.css')
    </head>
    <body>
        @yield('content')
        @yield('unique-js')
    </body>
</html>
