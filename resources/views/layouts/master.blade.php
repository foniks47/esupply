<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head-meta')
    @include('partials.head-style')
    @include('partials.head-script')
    @yield('style')
</head>
{{-- <body class="control-sidebar-slide-open text-sm sidebar-mini sidebar-collapse layout-fixed">  --}}

<body class="control-sidebar-slide-open text-sm sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('partials.header')
        @include('partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- Content Wrapper. -->
        @include('partials.footer')
        @include('partials.foot-script')
    </div>
    <!-- ./wrapper -->
    @yield('script')
    @stack('child-scripts')
</body>

</html>
