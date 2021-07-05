@extends('layout')

@section('title')
    Register
@endsection

@section('content')
    <!--sign up section start-->
    <section class="section section-lg section-header position-relative min-vh-100 flex-column d-flex justify-content-center" style="background: url('{{ asset('assets/img/slider-bg-1.svg') }}')no-repeat center bottom / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-md-4 col-lg-4">
                    <div class="hero-content-left text-white">
                        <h1 class="display-2">Create Your Account</h1>
                        <p class="lead">
                            Keep your face always toward the sunshine - and shadows will fall behind you.
                        </p>
                    </div>
                </div>

                <div class="col-md-8 col-lg-8">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h3>Create Account</h3>
                            </div>

                            <!--sign up form-->
                            <form class="login-signup-form" method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                First Name
                                            </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <input type="text" name="first_name"
                                                       class="form-control @error('first_name') is-invalid @enderror"
                                                       placeholder="First Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                Last Name
                                            </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <input type="text" name="last_name"
                                                       class="form-control @error('last_name') is-invalid @enderror"
                                                       placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                Email Address
                                            </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-email"></i>
                                                </div>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                       placeholder="name@address.com" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">Mobile</label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <input type="text" name="mobile"
                                                       class="form-control @error('mobile') is-invalid @enderror"
                                                       placeholder="Mobile number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">Referee (Include referee code)</label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <input type="text" name="referee"
                                                       class="form-control @error('referee') is-invalid @enderror"
                                                       placeholder="Referee">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                Mode of Payment
                                            </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-lock"></i>
                                                </div>
                                                <select name="mode_of_payment"
                                                        class="form-control @error('mode_of_payment') is-invalid @enderror">
                                                    <option value="">Select</option>
                                                    <option value="Orange Money">Orange Money</option>
                                                    <option value="Zamani Money">Zamani Money</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Password -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">
                                                Password
                                            </label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-lock"></i>
                                                </div>
                                                <input type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       placeholder="Enter your password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Password -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="font-weight-bold">Confirm Password</label>
                                            <!-- Input group -->
                                            <div class="input-group input-group-merge">
                                                <div class="input-icon">
                                                    <i class="ti-lock"></i>
                                                </div>
                                                <input type="password" name="password_confirm" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="my-4">
                                            <div class="form-check square-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="check-terms" required>
                                                <label class="form-check-label" for="check-terms">
                                                    I agree to the <a href="{{ url('terms') }}">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button class="btn btn-block btn-secondary border-radius mt-4 mb-3">
                                            Sign up</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-soft text-center border-top px-md-5"><small>Already registered?</small>
                            <a href="{{ url('login') }}" class="small"> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--sign up section end-->
@endsection
