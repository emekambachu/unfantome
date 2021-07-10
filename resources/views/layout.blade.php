<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('images/unfantome_logoonly.png') }}" type="image/png" sizes="16x16">

    <!--title-->
    <title>@yield('title') - Unfantome</title>

    <!--build:css-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- endbuild -->

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

<!--preloader start-->
<div id="preloader">
    <div class="loader1">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!--preloader end-->

<!--header section start-->
<header class="header position-relative z-9">
    <!--Language Translator Display-->
    <div style="background-color: #0648B3;" align="center">
        <a href="#" onclick="doGTranslate('en|en');return false;" title="English"
           style="background-position:-0px -0px; color: #ffffff; margin-right: 3px;">ENGLISH
        </a>
        <span class="text-white">| </span>
        <a href="#" onclick="doGTranslate('en|fr');return false;" title="French"
           style="background-position:-200px -100px; color: #ffffff;">FRANÇAIS
        </a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary fixed-top headroom">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-3" href="{{ url('/') }}">
                <img class="navbar-brand-dark" src="{{ asset('images/unfantome_logo.png') }}" alt="menuimage">
                <img class="navbar-brand-light" src="{{ asset('images/unfantome_logo.png') }}" alt="menuimage">
            </a>
            <div class="navbar-collapse collapse" id="navbar-default-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/unfantome_logo.png') }}" alt="menuimage">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <i class="fas fa-times" data-toggle="collapse" role="button"
                               data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                               aria-expanded="false" aria-label="Toggle navigation"></i>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav navbar-nav-hover ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <span class="nav-link-inner-text">Company</span>
                            <i class="fas fa-angle-down nav-link-arrow ml-1"></i>
                        </a>
                        <ul class="sub-menu dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('about') }}">About us</a></li>
                            <li><a class="dropdown-item" href="{{ url('terms') }}">Terms and conditions</a></li>
                            <li><a class="dropdown-item" href="{{ url('legal') }}">Legal</a></li>
                            <li><a class="dropdown-item" href="{{ url('faq') }}">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="">Contact Us</a></li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary p-2 mt-2 border-radius text-white"
                           href="{{ url('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary p-2 mt-2 border-radius text-white"
                           href="{{ url('register') }}">Sign up</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar-default-primary"
                        aria-controls="navbar-default-primary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
<!--header section end-->

<div class="main">

    @yield('content')

</div>

<!--footer section start-->
<footer class="footer-wrap">
    <div class="footer footer-top section section-md bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-4 text-center">
                        <a class="text-center" href="{{ url('/') }}">
                            <img src="{{ asset('images/unfantome_logo.png') }}" width="120" alt="Footer logo">
                        </a>
                    <p>
                        Unnfantome is a community! A community that is bound with the saying “Givers never lack”. One that is designed majorly to help the people. The activities of this community is simple, The Fantomes help each other grow financially by paying to themselves as instructed by the community leader.
                    </p>
                    <p>
                        Email: info@unfantome.com
                    </p>
                    <div class="btn-wrapper mt-4">
                        <button class="btn btn-icon-only btn-pill btn-twitter mr-2 icon icon-xs icon-shape" type="button"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="40k Followers">
                            <span aria-hidden="true" class="fab fa-twitter"></span>
                        </button>
                        <button class="btn btn-icon-only btn-pill btn-facebook mr-2 icon icon-xs icon-shape" type="button"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="50k Like">
                            <span aria-hidden="true" class="fab fa-facebook-f"></span>
                        </button>
                        <button class="btn btn-icon-only btn-pill btn-youtube mr-2 icon icon-xs icon-shape" type="button"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="25k Subscribe">
                            <span aria-hidden="true" class="fab fa-youtube"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer py-3 bg-primary text-white border-top border-variant-default">
        <div class="container">
            <div class="row">
                <div class="col p-3">
                    <div class="d-flex text-center justify-content-center align-items-center">
                        <p class="copyright pb-0 mb-0">Copyrights © {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer section end-->

<!--scroll bottom to top button start-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fas fa-hand-point-up"></span>
</button>
<!--scroll bottom to top button end-->

<!--build:js-->
<script src="{{ asset('assets/js/vendors/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/headroom.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/jquery.waypoints.min.js') }}"></script>

<!--<script src="assets/js/vendors/countUp.min.js"></script>-->
<script src="{{ asset('assets/js/vendors/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/validator.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<!--endbuild-->

</body>

</html>
