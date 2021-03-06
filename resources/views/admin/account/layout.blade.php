<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>@yield('title') - Unfantome </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/unfantome_logoonly.png') }}">
    <link href="{{ asset('auth/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('auth/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('auth/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">
    <link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    @yield('top-assets')
</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="" class="brand-logo">
            <img class="logo-compact" src="{{ asset('images/unfantome_logoonly.png') }}" alt="">
            <img class="brand-title" src="{{ asset('images/unfantome_logo.png') }}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">

                    <div class="header-left">
                        {{--                        <div class="search_bar dropdown">--}}
                        {{--                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">--}}
                        {{--                                    <i class="mdi mdi-magnify"></i>--}}
                        {{--                                </span>--}}
                        {{--                            <div class="dropdown-menu p-0 m-0">--}}
                        {{--                                <form>--}}
                        {{--                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">--}}
                        {{--                                </form>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    <ul class="navbar-nav header-right">

                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell dz-fullscreen" href="#">
                                <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                                <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                            </a>
                        </li>

                        {{--                        <li class="nav-item dropdown notification_dropdown">--}}
                        {{--                            <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">--}}
                        {{--                                <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">--}}
                        {{--                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>--}}
                        {{--                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>--}}
                        {{--                                </svg>--}}
                        {{--                                <div class="pulse-css"></div>--}}
                        {{--                            </a>--}}
                        {{--                            <div class="dropdown-menu dropdown-menu-right">--}}
                        {{--                                <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">--}}
                        {{--                                    <ul class="timeline">--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="timeline-panel">--}}
                        {{--                                                <div class="media mr-2">--}}
                        {{--                                                    <img alt="image" width="50" src="{{ asset('auth/images/avatar/1.jpg') }}">--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="media-body">--}}
                        {{--                                                    <h6 class="mb-1">Dr sultads Send you Photo</h6>--}}
                        {{--                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="timeline-panel">--}}
                        {{--                                                <div class="media mr-2 media-info">--}}
                        {{--                                                    KG--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="media-body">--}}
                        {{--                                                    <h6 class="mb-1">Resport created successfully</h6>--}}
                        {{--                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="timeline-panel">--}}
                        {{--                                                <div class="media mr-2 media-success">--}}
                        {{--                                                    <i class="fa fa-home"></i>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="media-body">--}}
                        {{--                                                    <h6 class="mb-1">Reminder : Treatment Time!</h6>--}}
                        {{--                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="timeline-panel">--}}
                        {{--                                                <div class="media mr-2">--}}
                        {{--                                                    <img alt="image" width="50" src="{{ asset('auth/images/avatar/1.jpg') }}">--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="media-body">--}}
                        {{--                                                    <h6 class="mb-1">Dr sultads Send you Photo</h6>--}}
                        {{--                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="timeline-panel">--}}
                        {{--                                                <div class="media mr-2 media-danger">--}}
                        {{--                                                    KG--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="media-body">--}}
                        {{--                                                    <h6 class="mb-1">Resport created successfully</h6>--}}
                        {{--                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <div class="timeline-panel">--}}
                        {{--                                                <div class="media mr-2 media-primary">--}}
                        {{--                                                    <i class="fa fa-home"></i>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="media-body">--}}
                        {{--                                                    <h6 class="mb-1">Reminder : Treatment Time!</h6>--}}
                        {{--                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </li>--}}
                        {{--                                    </ul>--}}
                        {{--                                </div>--}}
                        {{--                                <a class="all-notification" href="#">See all notifications <i--}}
                        {{--                                        class="ti-arrow-right"></i></a>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}

                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <img src="{{ asset('auth/user.png') }}" width="20" alt=""/>
                                <div class="header-info">
                                    <span>Hey, <strong>{{ Auth::user()->name }}</strong></span>
                                    <small></small>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('admin.account-settings') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ml-2">Account Setting</span>
                                </a>

                                {{--                                <a href="email-inbox.html" class="dropdown-item ai-icon">--}}
                                {{--                                    <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>--}}
                                {{--                                    <span class="ml-2">Inbox </span>--}}
                                {{--                                </a>--}}

                                <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ml-2">Logout </span>
                                </a>

                            </div>
                        </li>

                        <li class="nav-item right-sidebar">
                            <a class="nav-link bell ai-icon" href="#">
                                <svg id="icon-menu" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">

                <li>
                    <a class="ai-icon" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="fa fa-desktop"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.manage-users') }}" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="nav-text">Manage users</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.investments.index') }}" aria-expanded="false">
                        <i class="fa fa-line-chart"></i>
                        <span class="nav-text">Investments</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.pairings') }}" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">Pairings</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.payment-plans') }}" aria-expanded="false">
                        <i class="fa fa-money"></i>
                        <span class="nav-text">Payment Plans</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.market-place') }}" aria-expanded="false">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="nav-text">Market Place</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.account-settings') }}" aria-expanded="false">
                        <i class="fa fa-cogs"></i>
                        <span class="nav-text">Account Settings</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('admin.logout') }}" aria-expanded="false">
                        <i class="fa fa-bed"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
@yield('content')
<!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright ?? Unfantome. {{ date('Y') }}</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('auth/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('auth/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('auth/js/custom.min.js') }}"></script>
<!-- Apex Chart -->
<script src="{{ asset('auth/vendor/apexchart/apexchart.js') }}"></script>

<!-- Vectormap -->
<!-- Chart piety plugin files -->
<script src="{{ asset('auth/vendor/peity/jquery.peity.min.js') }}"></script>

<!-- Chartist -->
<script src="{{ asset('auth/vendor/chartist/js/chartist.min.js') }}"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('auth/js/dashboard/dashboard-1.js') }}"></script>
<!-- Svganimation scripts -->
<script src="{{ asset('auth/vendor/svganimation/vivus.min.js') }}"></script>
<script src="{{ asset('auth/vendor/svganimation/svg.animation.js') }}"></script>

<script>
    (function($) {
        "use strict"

        var direction =  getUrlParams('dir');
        if(direction != 'rtl')
        {direction = 'ltr'; }

        new dezSettings({
            typography: "roboto",
            version: "light",
            layout: "vertical",
            headerBg: "color_1",
            navheaderBg: "color_3",
            sidebarBg: "color_1",
            sidebarStyle: "full",
            sidebarPosition: "fixed",
            headerPosition: "fixed",
            containerLayout: "wide",
            direction: direction
        });

    })(jQuery);
</script>

@yield('bottom-assets')

</body>

</html>
