@extends('layout')

@section('title')
    Terms and Conditions
@endsection

@section('content')
    <section class="" style="background: url({{ asset('assets/img/header-bg-5.jpg') }})no-repeat center center / cover">
        <div class="section-lg bg-gradient-primary text-white section-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-center">
                            <h1>Terms and conditions</h1>
                            <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                                <ol class="breadcrumb breadcrumb-transparent breadcrumb-text-light">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
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
                        <h4>General</h4>
                        <p class="lead">The terms and conditions contained herein apply to the investment services of Unfantome investment company made available through its official website at unfantome.com. All information made available to the investor/client pertaining to this Promotion, including information contained within websites of Unfantome, form a legal agreement between the investor/client and Unfantome.
                            By electing to participate in any of the investment businesses of Unfantome, you are indicating you agree to be bound by the terms and conditions contained herein and contained within website materials of Unfantome, coupled with any Client Agreement(s) executed.
                            Unfantome reserves the right to amend these terms and conditions at any time. Such modifications shall become effective immediately at the time the amendment is executed and posted on the Unfantome website. Unfantome is not required to make announcements as to such amendments.</p>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="video-promo-content">
                        <h4>Eligible Accounts</h4>
                        <p class="lead">To be eligible to participate in any of the services of Unfantome, clients/investors or their representatives must be eighteen (18) years of age or older, or the legal age of majority in the client's/investor's home country, state or province; be legally entitled to use our services in accordance with applicable law; currently maintain a cryptocurrency account with a Wallet; and make a deposit with Unfantome totaling no less than the stipulated account on the chosen investment product (the Initial Deposit) during the investment Period as defined herein.</p>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="video-promo-content">
                        <h4>Account Restrictions</h4>
                        <p class="lead">If there are promotions of bonuses on accounts within Unfantome, these promotions will be based on a One bonus per account per client. Also, accounts are only transferable with requests made, reviewed, and granted by the management of Unfantome.</p>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="video-promo-content">
                        <h4>Account activation and operation</h4>
                        <p class="lead">Unfantome will credit all Eligible Accounts, as defined herein, with deposits (as made by investor) totaling an amount determined by the initial deposit made by client, as set forth in the table of plans. Such deposit must be made within 48 hours of creating an investment account or the said account shall be deleted.<br>
                            Client must complete the required lots (as stipulated in the chosen plan) prior to the activation of the investment account within 48 hours of opening the account. Charges on investment account operation and/or maintenance shall be deducted upon completion of investment cycle. Withdrawals can only be made after an account completes its initial investment cycle (IIC) as stipulated in the plan details.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--about section end-->
@endsection
