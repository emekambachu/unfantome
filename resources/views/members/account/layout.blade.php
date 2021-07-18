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

<!-- GTranslate: https://gtranslate.io/ -->
    <style type="text/css">
        <!--
        a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
        a.gflag img {border:0;}
        a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
        #goog-gt-tt {display:none !important;}
        .goog-te-banner-frame {display:none !important;}
        .goog-te-menu-value:hover {text-decoration:none !important;}
        body {top:0 !important;}
        #google_translate_element2 {display:none!important;}
        -->
    </style>

    <div id="google_translate_element2"></div>

    <script type="text/javascript">
        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

    <script type="text/javascript">
        /* <![CDATA[ */
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
        /* ]]> */
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/60e9c4d0d6e7610a49aaa069/1fa8ihkk6';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

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
        <!--Language Translator Display-->
        <div style="background-color: #1A2C79;" align="center">
            <a href="#" onclick="doGTranslate('en|en');return false;" title="English"
               style="background-position:-0px -0px; color: #ffffff; margin-right: 3px;">ENGLISH
            </a>
            <span class="text-white">| </span>
            <a href="#" onclick="doGTranslate('en|fr');return false;" title="French"
               style="background-position:-200px -100px; color: #ffffff;">FRANÇAIS
            </a>
        </div>
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">

                    <div class="header-left">
                        <p class="ml-2">Referral Code: {{ Auth::user()->referral_code }}</p>
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
                                <img src="{{ asset(!empty(Auth::user()->image) ? 'photos/members/'.Auth::user()->image : 'auth/user.png') }}" width="20" alt=""/>
                                <div class="header-info">
                                    <span>Hey, <strong>{{ Auth::user()->name }}</strong></span>
                                    <small></small>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('member.account-settings') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ml-2">Account Setting</span>
                                </a>

                                {{--                                <a href="email-inbox.html" class="dropdown-item ai-icon">--}}
                                {{--                                    <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>--}}
                                {{--                                    <span class="ml-2">Inbox </span>--}}
                                {{--                                </a>--}}

                                <a href="{{ route('member.logout') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ml-2">Logout </span>
                                </a>

                            </div>
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
                    <a class="ai-icon" href="{{ route('member.dashboard') }}" aria-expanded="false">
                        <i class="fa fa-desktop"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('member.all-payments') }}" aria-expanded="false">
                        <i class="fa fa-money"></i>
                        <span class="nav-text">Investments</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('member.market-place') }}" aria-expanded="false">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="nav-text">Market Place</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="" aria-expanded="false">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="nav-text">Manage Products</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('member.account-settings') }}" aria-expanded="false">
                        <i class="fa fa-cogs"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>

                <li>
                    <a class="ai-icon" href="{{ route('member.logout') }}" aria-expanded="false">
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
            <p>Copyright © Unfantome. {{ date('Y') }}</p>
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
        if(direction !== 'rtl')
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
