<!DOCTYPE html>
<html lang="en">
<!-- page Header -->
<x-app.header> </x-app.header>
<!-- END page Header -->

<body class="nav-md">
<div class="container body" >
    <div class="main_container">
        <div class="col-md-3 left_col" >
            <div class="left_col scroll-view">
                <!-- side-bar -->
                <x-app.side-bar> </x-app.side-bar>
                <!-- END side-bar -->

                <!-- Menu-Footer -->
                <x-app.menu-footer> </x-app.menu-footer>
                <!-- END Menu-Footer -->
            </div>
        </div>
        <!-- top-nav -->
        <x-app.top-nav> </x-app.top-nav>
        <!-- END top-nav -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content');
        </div>
    </div>
</div>

<!-- page Footer -->
<x-app.footer> </x-app.footer>
@yield('scripts');
<!-- END page Footer -->

</body>
</html>
