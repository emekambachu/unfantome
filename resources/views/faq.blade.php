@extends('layout')

@section('title')
    FAQ
@endsection

@section('content')
    <section class="" style="background: url({{ asset('assets/img/header-bg-5.jpg') }})no-repeat center center / cover">
        <div class="section-lg bg-gradient-primary text-white section-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-center">
                            <h1>FAQ</h1>
                            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                                <ol class="breadcrumb breadcrumb-transparent breadcrumb-text-light">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-lg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <!--Accordion-->
                    <div class="accordion">

                        <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                            <div data-target="#panel-1" class="accordion-panel-header icon-title" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="panel-1"><span class="h6 mb-0">Does my subscription automatically renew?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                            <div class="collapse show" id="panel-1">
                                <div class="accordion-content">
                                    <p>At ThemeTags, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                            <div data-target="#panel-2" class="accordion-panel-header icon-title collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-2"><span class="h6 mb-0">What happens if I don’t renew my license?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                            <div class="collapse" id="panel-2">
                                <div class="accordion-content">
                                    <p>At ThemeTags, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                            <div data-target="#panel-3" class="accordion-panel-header icon-title collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-3"><span class="h6 mb-0">Can I cancel my subscription?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                            <div class="collapse" id="panel-3">
                                <div class="accordion-content">
                                    <p>At ThemeTags, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                            <div data-target="#panel-4" class="accordion-panel-header icon-title collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-4"><span class="h6 mb-0">Do I need to renew my license to receive fixes?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                            <div class="collapse" id="panel-4">
                                <div class="accordion-content">
                                    <p>At ThemeTags, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-sm px-4 py-3 border border-light rounded mb-4">
                            <div data-target="#panel-5" class="accordion-panel-header icon-title collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-5"><span class="h6 mb-0">Where can I find the End User License Agreement (EULA)?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                            <div class="collapse" id="panel-5">
                                <div class="accordion-content">
                                    <p>At ThemeTags, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--End of Accordion-->
                </div>
            </div>
        </div>
    </section>
@endsection
