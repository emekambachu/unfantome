@extends('layout')

@section('title')
    About
@endsection

@section('content')
    <section class="" style="background: url({{ asset('assets/img/header-bg-5.jpg') }})no-repeat center center / cover">
        <div class="section-lg bg-gradient-primary text-white section-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-center">
                            <h1>About Us</h1>
                            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                                <ol class="breadcrumb breadcrumb-transparent breadcrumb-text-light">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--promo section start-->
    <section class="section section-sm pb-0 z-3">
        <div class="container mt-n8">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row text-white shadow-lg">
                        <div class="col-12 col-md-4 px-md-0 mb-4 mb-lg-0">
                            <div class="card-body text-center bg-default border-right border-variant-primary py-5">
                                <h2 class="font-weight-bold"><span class="h4 mr-2">Advertise your product</span></h2>
                                <p class="mb-0">advertising your products on the platform, which would be shared to the thousands of people in Fantome</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-md-0 mb-4 mb-lg-0">
                            <div class="card-body text-center bg-secondary border-right border-variant-primary py-5">
                                <h2 class="font-weight-bold"><span class="h4 mr-2">Donations</span></h2>
                                <p class="mb-0">The second way is to donate to your fellow Fantome, You can donate from 5000frs to 3million francs.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-md-0">
                            <div class="card-body text-center bg-primary py-5">
                                <h2 class="font-weight-bold"><span class="h4 mr-2">Referal</span></h2>
                                <p class="mb-0">Invite people into the community, when they make a donation, you will also get 5% of the amount they donated.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--about section start-->
    <section class="section section-lg  ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-12 col-lg-6 mb-4 mb-md-4 mb-lg-0">
                    <div class="card bg-primary position-relative  shadow-lg fancy-radius p-3">
                        <div class="dot-shape-top position-absolute">
                            <img src="{{ asset('assets/img/color-shape.svg') }}" alt="dot" class="img-fluid">
                        </div>
                        <img class="fancy-radius img-fluid" src="{{ asset('images/slide/slide3.jpg') }}" alt="modern desk">
                        <div class="dot-shape position-absolute bottom-0">
                            <img src="{{ asset('assets/img/dot-shape.png') }}" alt="dot">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="video-promo-content">
                        <h2>What will Unfantome do for you</h2>
                        <p class="lead">Unnfantome is a community! A community that is bound with the saying “Givers never lack”. One that is designed majorly to help the people. The activities of this community is simple, The Fantomes help each other grow financially by paying to themselves as instructed by the community leader.</p>
                        <p>
                            The idea of the Fantome community is for people to know each other, sell their products and help themselves grow financially. There are 3 ways to make money in Fantome community, the first is by advertising your products on the platform, which would be shared to the thousands of people in Fantome, hereby linking you to quick buyers.<br>
                            The second way is to donate to your fellow Fantome, You can donate from 5000frs to 3million francs, depending on how much you are capable of donating, the community head will direct you on who to donate to. then after one week, another Fantome will be directed to donate to you too with extra 50% of the amount you donated.<br>
                            The third way of making money in Fantome is to invite people into the community, when they make a donation, you will also get 5% of the amount they donated.  ARE YOU READY TO BE PART OF  THIS COMMUNITY?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about section end-->

    <section class="section section-lg bg-soft ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Payment Plans</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 mb-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <div class="card-icon mb-4">
                            <img src="{{ asset('assets/img/icon/icon-8.svg') }}" alt="icon" class="img-fluid" width="60">
                        </div>
                        <h2 class="h5">Earn 50% in 7 days</h2>
                        <h2 class="h6">5000 CFA to 900,000 CFA</h2>
                    </div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-md-6 col-lg-6 mb-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <div class="card-icon mb-4">
                            <img src="{{ asset('assets/img/icon/icon-8.svg') }}" alt="icon" class="img-fluid" width="60">
                        </div>
                        <h2 class="h5">Earn 100% in 7 days</h2>
                        <h2 class="h6">1million CFA to 3million CFA</h2>
                    </div>
                    <!-- End of Icon box -->
                </div>
            </div>
        </div>
    </section>

    <section class="section section-lg  bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading mb-5 text-center text-white">
                        <h2>Community Service</h2>
                        <p class="lead">
                            Every member of this community must give something to the less privileged after they receive payment up to five times in Fantome. Remember Givers never lack.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--services section start-->
    <section class="section services-section ptb-100 bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Our rules</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-4">
                    <div class="services-single d-flex p-5 shadow-sm bg-white rounded">
                        <div class="icon icon-lg mr-4 text-secondary">
                            <i class="ti-announcement"></i>
                        </div>
                        <div class="services-content-wrap">
                            <p>If you send a request to make a donation, when the community leader matches you to pay someone, make the payment within 6hours, if due to unforeseen circumstances you are unable to, call the supposed receiver and plead with them to extend your time to 24hours. Else your account will be blocked.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-4">
                    <div class="services-single d-flex p-5 shadow-sm bg-white rounded">
                        <div class="icon icon-lg mr-4 text-secondary">
                            <i class="ti-announcement"></i>
                        </div>
                        <div class="services-content-wrap">
                            <p>After registering in Fantome, if you do not make a donation after 1 week, your account will be blocked.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-4">
                    <div class="services-single d-flex p-5 shadow-sm bg-white rounded">
                        <div class="icon icon-lg mr-4 text-secondary">
                            <i class="ti-announcement"></i>
                        </div>
                        <div class="services-content-wrap">
                            <p>Authoritatively reinvent multimedia based niches with global portals orchestrate client-centered.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-4">
                    <div class="services-single d-flex p-5 shadow-sm bg-white rounded">
                        <div class="icon icon-lg mr-4 text-secondary">
                            <i class="ti-announcement"></i>
                        </div>
                        <div class="services-content-wrap">
                            <p>After receiving a donation from a person, if you do not donate to another person with 3 days, your account will be blocked.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-4">
                    <div class="services-single d-flex p-5 shadow-sm bg-white rounded">
                        <div class="icon icon-lg mr-4 text-secondary">
                            <i class="ti-announcement"></i>
                        </div>
                        <div class="services-content-wrap">
                            <p>Enthusiastically scale client-centric supply chains vis-a-vis enabled benefits empower global core.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mb-4 mb-md-4">
                    <div class="services-single d-flex p-5 shadow-sm bg-white rounded">
                        <div class="icon icon-lg mr-4 text-secondary">
                            <i class="ti-announcement"></i>
                        </div>
                        <div class="services-content-wrap">
                            <p>After receiving your 5th payment, you are expected to go and bless the less privileged around you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services section end-->

    <!--cta section start-->
    <section class="section py-0" style="background: url('{{ asset('images/bg/5f739894b2b8d.jpg') }}')no-repeat center fixed">
        <div class="section-lg section bg-gradient-primary text-white  ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-10 col-lg-9">
                        <div class="section-title text-center mb-5">
                            <h2>How to join Unfantome</h2>
                            <p class="lead">
                                Joining this community is not difficult, all you have to do is register on the website and place a request to donate. Wait for the Community Leader to direct you who to pay to, you are expected to send the amount you want to donate to the person that will show on your screen.<br> The person’s phone number will be made available too incase you want to communicate. If you do not make the payment within 6hours, your Fantome account will be blocked, after you Donate, you wait for 7days, then click on I NEED HELP, within 6hours you will get paid.<br> And if a person fails to pay you, after 24hours, the community head will block that person’s account and direct another to pay you.
                            </p>
                            <a href="{{ route('register-form') }}" class="btn btn-primary  mt-3">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cta section end-->

    <section class="section section-lg">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-12 col-lg-5">
                    <h2>Why you can trust us</h2>
                    <p class="lead"> Fantome is created for the people and owned by the people. An anonymous group of persons came together and birthed the idea of people helping one another.</p>
                </div>

                <div class="col-12 col-lg-6 ml-lg-auto">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="card bg-default text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-5 text-center">
                                    <span class="icon icon-lg d-block"><i class="fas fa-user-shield"></i></span>
                                    <h5>Customer service</h5>
                                    <p class="mb-0">Create low-effort customer service experiences.</p>
                                </div>
                            </div>
                            <div class="card bg-success text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-5 text-center">
                                    <span class="icon icon-lg d-block"><i class="fas fa-fire"></i></span>
                                    <h5>Marketplace</h5>
                                    <p class="mb-0">Proactively develop B2B alignments rather.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-lg-4">
                            <div class="card bg-secondary text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-5 text-center">
                                    <span class="icon icon-lg d-block"><i class="fas fa-lightbulb"></i></span>
                                    <h5>Service to sales</h5>
                                    <p class="mb-0">Progressively brand clicks-and-mortar.</p>
                                </div>
                            </div>
                            <div class="card bg-primary text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-5 text-center">
                                    <span class="icon icon-lg d-block"><i class="fas fa-shapes"></i></span>
                                    <h5>Make it simple</h5>
                                    <p class="mb-0">Competently evolve user friendly platform.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--testimonial section start-->
    <section class="section section-lg bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading mb-5 text-center">
                        <h2>Who owns Fantome</h2>
                        <p class="lead">
                            Nobody! As the name implies “Fantome” which is a French word for “Ghost”, Fantome is created for the people and owned by the people. An anonymous group of persons came together and birthed the idea of people helping one another. They make donations and receive donations just like every other person. Fantome is the answer to your financial prayers, help others and get help from others. Do not forget to give to the less privileged too.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial section end-->
@endsection
