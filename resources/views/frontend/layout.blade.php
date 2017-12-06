<!DOCTYPE html>
<html lang="ja">
    <head>
        @include('frontend.shared.partials.meta')
        @include('frontend.shared.partials.css')
        @include('frontend.shared.partials.user-generated-css')
    </head>
    <body>
        @include('frontend.shared.partials.header')
        @yield('content')
        @yield('unique-js')
        @include('frontend.shared.partials.user-generated-js')
        @include('frontend.shared.partials.footer')
    </body>
</html>
