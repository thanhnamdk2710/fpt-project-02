<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>TN Fashion Management</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <meta name="msapplication-TileColor" content="#3399cc" />
        <link rel="icon" href="{{asset('images/icon.png')}}" type="image/png">

        @include('backend.layouts.partials.styles')

        @stack('styles')
    </head>
    <body>
        @include('backend.layouts.partials.header')
        <!-- #wrapper -->
        <div id="wrapper">
            @include('backend.layouts.partials.sidebar')

            <div class="page-content sidebar-page clearfix">
                @yield('content')
            </div>
        </div>

        @include('backend.layouts.partials.footer')
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>

        @include('backend.layouts.partials.scripts')

        @stack('scripts')
    </body>
</html>
