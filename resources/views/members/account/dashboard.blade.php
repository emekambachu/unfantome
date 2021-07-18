@extends('members.account.layout')

@section('title')
    Dashboard
@stop

@section('top-assets')
    <!-- Custom Stylesheet -->
    <link href="{{ asset('auth/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-9 col-xxl-12">
                    <div class="row">
                        <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body pb-0 px-4 pt-4">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="mb-1">CFA </h5>
                                            <span class="text-success">Total Investment</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="areaChart_2" class="chartjs-render-monitor" height="90"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                            <div class="card bg-success	overflow-hidden">
                                <div class="card-body pb-0 px-4 pt-4">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="text-white mb-1">CFA {{!empty($currentPayment->amount) ? number_format($currentPayment->amount) : 0 }}</h5>
                                            <span class="text-white">Current Investment</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-wrapper" style="width:100%">
                                    <span class="peity-line" data-width="100%">6,2,8,4,3,8,4,3,6,5,9,2</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-4 col-lg-6 col-sm-6">
                            <div class="card bg-primary overflow-hidden">
                                <div class="card-body pb-0 px-4 pt-4">
                                    <div class="row">
                                        <div class="col text-white">
                                            <h5 class="text-white mb-1">CFA {{ number_format(Auth::user()->expectedReturn()) }}</h5>
                                            <span>Expected returns</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-wrapper px-2">
                                    <canvas id="chart_widget_2" height="100"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Invest</h4>
                        </div>
                        <div class="card-body">
                            @include('includes.alerts')
                            <div class="basic-form">
                                <form method="post" action="{{ route('member.make-payment') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Payment Plan:</label>
                                        <select class="form-control mb-4" name="payment_plan_id" id="sel1" required>
                                            @foreach($paymentPlans as $plan)
                                            <option value="{{ $plan->id }}">%{{ $plan->percentage }}, {{ $plan->days.' days' }}, {{ number_format($plan->min).' to '. number_format($plan->max)}}</option>
                                            @endforeach
                                        </select>
                                        <label>Amount:</label>
                                        <input type="text" class="form-control mb-4" name="amount" required>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if($payer)
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">You have been paired to pay {{ $payer->receiver->name }}</h4>
                            <h6 id="countdown" class="card-title text-success"></h6>
                            <h6 class="card-title">Contact them via</h6>
                            <p><strong>Email:</strong> {{ $receiver->receiver->email }}</p>
                            <p><strong>Mobile:</strong> {{ $receiver->receiver->mobile }}</p>
                            <p>Once you have made payment, upload a screenshot of the payment and click "CONFIRM PAYMENT" </p>
                            <p class="font-medium text-danger">NOTE: The receiver has to approve that they have received the money before payment can be fully confirmed</p>
                        </div>
                        <div class="card-body">
                            @include('includes.alerts')
                            <div class="basic-form">
                                <form method="post" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label>Proof of payment (jpg, jpeg, png):</label>
                                        <input class="form-control" type="file" name="proof_of_payment" required>

                                        <button type="submit" class="btn btn-primary">I have paid</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <div class="row">
                <div class="col-12">
                    <h4>Market Place</h4>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('auth/images/product/3.jpg') }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h5>Product Name</h5>
                                    <p>Email / Mobile</p>
                                    <p>Location</p>
                                    <span class="price">$357.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('auth/images/product/4.jpg') }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h5>Product Name</h5>
                                    <p>Email / Mobile</p>
                                    <p>Location</p>
                                    <span class="price">$654.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('auth/images/product/5.jpg') }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h5>Product Name</h5>
                                    <p>Email / Mobile</p>
                                    <p>Location</p>
                                    <span class="price">$369.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-info">More</button>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script>
        let h = {{ $payer->time_limit }};
        // Convert hours to seconds first
        var count = (h * 60) * 60;
        var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

        function timer() {
            count = count - 1;
            if (count === -1) {
                clearInterval(counter);
                return;
            }

            var seconds = count % 60;
            var minutes = Math.floor(count / 60);
            var hours = Math.floor(minutes / 60);
            minutes %= 60;
            hours %= 60;

            document.getElementById("countdown").innerHTML = hours + " hours " + minutes + " minutes and " + seconds + " seconds";
        }
    </script>

    <script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
