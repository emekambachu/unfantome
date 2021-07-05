@extends('layout')

@section('title')
    Legal
@endsection

@section('content')
    <section class="" style="background: url({{ asset('assets/img/header-bg-5.jpg') }})no-repeat center center / cover">
        <div class="section-lg bg-gradient-primary text-white section-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-center">
                            <h1>Legal</h1>
                            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                                <ol class="breadcrumb breadcrumb-transparent breadcrumb-text-light">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Legal</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--about section start-->
    <section class="section section-lg">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-12 col-lg-12">
                    <div class="video-promo-content">
                        <p class="lead">The content provided on this website is for informational purposes only. Digital Trading Options is not responsible for, and explicitly disclaims, all liability for damages of any kind arising out of the use, reference to or reliance on any information contained within the website.<br>
                            Although the Digital Trading Options website may include links with direct access to other internet resources / websites, it is not responsible for the accuracy or content of the information listed on these sites. Links from the Digital Trading Options website to third party websites do not constitute an endorsement by Digital Trading Options of those parties or their products and services.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--about section end-->
@endsection
