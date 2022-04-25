<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.layouts.links')
        <title>IPS</title>
    </head>
    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('admin.layouts.nav')
            @include('admin.layouts.left_nav')
            <div class="main-content">
                @yield('content')
                @yield('admin.layouts.footer')
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        @include('admin.layouts.script')
        @yield('script')
    </body>
</html>