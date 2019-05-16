<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @include('admin._includes.partials.admin_head')
    @include('admin._includes.partials.admin_headermobile')
    @yield('style')
</head>
<body>
    @include('admin._includes.partials.admin_left_panel')
    @yield('content')
    @yield('scripts')
     @include('admin._includes.partials.admin_footer')
    </body>
</html>