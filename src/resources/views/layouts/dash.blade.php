<html lang="en-US">
@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')

<head>
    @include('adminpanel::includes.headDash')
    {{--  <script src="/ddkits/adminpanel/assets-dashboard/js/build/getfreeapi-min.js"></script>  --}}
    @yield('meta')
</head>

<body class="">
    @if( ($getInfo->getAdmin(Auth::user()->id) == 1 AND $getInfo->getAdminLevel() == 0) || Auth::user()->id == 1)

    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="/" class="simple-text logo-mini">
                    <i class="fa fa-home"></i>
                </a>
                <a href="/ddk/dashboard" class="simple-text logo-normal">
                    {{ $getInfo->getValue('sitename') }}
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    @include('adminpanel::includes.dashLeftMenu')

                </ul>
            </div>
        </div>
        <div class="main-panel">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute bg-primary fixed-top">

                <div class="container-fluid">

                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        {{--  <a class="navbar-brand" href="{{ route('profile.show', Auth::user()->id)}}">{{ Auth::user()->email }}</a>  --}}
                        @include('adminpanel::includes.dashTopMenu')

                    </div>
                </div>

            </nav>
            <!-- End Navbar -->
            <div class="well message">
                @include('adminpanel::partials._messages')
            </div>
            @yield('content')

            <footer class="footer">
                @include('adminpanel::includes.homeFooter')
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/ddkits/adminpanel/assets-dashboard/js/jquery-3.2.1.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/core/jquery.min.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/popper.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/core/bootstrap.min.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/ddkits/adminpanel/assets-dashboard/js/plugins/bootstrap-notify.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/demo/demo.js"></script>
    <link rel="stylesheet" href="/ddkits/adminpanel/assets-dashboard/select2/css/select2.min.css">
    <script src="/ddkits/adminpanel/assets-dashboard/select2/js/select2.min.js"></script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/build/getfreeapi-2.js"></script>
    <!-- Google Analytics -->
    <!---->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', "{{ $getInfo->getValue('google_analytic') }}");
        ga('send', 'pageview');
    </script>
    <script src="/ddkits/adminpanel/assets-dashboard/js/build/getfreeapi.js"></script>

    @else
    <div class="wrapper ">
        You are not authorized to access this page.
    </div>
    @endif


</body>

</html>
