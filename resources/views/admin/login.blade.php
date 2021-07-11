@extends('layout')

@section('title')
    Admin Login
@endsection

@section('content')
    <!--sign up section start-->
    <section class="section section-lg section-header position-relative min-vh-100 flex-column d-flex justify-content-center"
             style="background: url('{{ asset('assets/img/slider-bg-1.svg') }}')no-repeat center bottom / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-md-4 col-lg-4">
                    <div class="hero-content-left text-white">
                        <h1 class="display-2">Login as admin</h1>
                    </div>
                </div>

                <div class="col-md-8 col-lg-8">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h3>Login</h3>
                            </div>

                        @include('includes.alerts')

                        <!--sign up form-->
                            <form class="login-signup-form" method="post" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                Username</label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-email"></i>
                                                </div>
                                                <input type="text" name="username"
                                                       class="form-control @error('username') is-invalid @enderror"
                                                       value="{{ old('username') }}" autofocus required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Password -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                Password</label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-lock"></i>
                                                </div>
                                                <input type="password" name="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       placeholder="Enter your password" autocomplete="current-password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="my-4">
                                            <div class="form-check square-check">
                                                <input class="form-check-input" name="remember" type="checkbox" value=""
                                                       id="check-terms">
                                                <label class="form-check-label" for="check-terms">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <button type="submit" class="btn btn-block btn-secondary border-radius mt-4 mb-3">
                                            Login
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--sign up section end-->
@endsection
