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
                                            <h5 class="mb-1">CFA {{ number_format($investments['total']) }}</h5>
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
                <div class="col-md-12">
{{--                    @if(Auth::user()->pendingPayment)--}}
{{--                        <p>You will be ready to be paired in {{ $payment_get_days }} days</p>--}}
{{--                    @endif--}}
                    @include('includes.alerts')
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Invest</h4>
                        </div>
                        <div class="card-body">
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

                @if($pairing_payer)
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                You have been paired to pay {{ $pairing_payer->receiver->name }} CFA{{ number_format($pairing_payer->amount) }} </h4>
                        </div>
                        <div class="p-2">
                            @if($timeLimit > $getSeconds)
                            <h6 id="countdown" class="card-title text-success"></h6>
                            @else
                            <h6 class="card-title text-danger">Your time has expired</h6>
                            @endif
                            <p>
                                <strong>Contact them via</strong><br>
                                <strong>Email:</strong> {{ $pairing_payer->receiver->email }}<br>
                                <strong>Mobile:</strong> {{ $pairing_payer->receiver->mobile }}<br>
                                <strong>Mode of Payment:</strong> {{ $pairing_payer->receiver->mode_of_payment }}<br>
                                <strong>Mobile Money Number:</strong> {{ $pairing_payer->receiver->account_number }}
                            </p>
                            <p class="font-weight-bolder">Once you have made payment, upload a screenshot of the payment and click "I HAVE PAID"<br>
                                <span class="text-danger">NOTE: The receiver has to approve that they have received the money before payment can be fully confirmed</span></p>
                        </div>
                        <div class="card-body">
                            @include('includes.alerts')
                            <div class="basic-form">
                                @if($pairing_payer->confirm_payment === 0)
                                <!--Upload receipt of payment-->
                                <form method="post"
                                      action="{{ route('member.confirm-payment', $pairing_payer->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Proof of payment (jpg, jpeg, png):</label>
                                        <input class="form-control mb-2" type="file"
                                               name="proof_of_payment" required>
                                        <button type="submit" class="btn btn-primary">I have paid</button>
                                    </div>
                                </form>

                                <form method="post" action="{{ route('member.cancel-payment', $pairing_payer->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">I'm unable to pay</button>
                                    </div>
                                </form>
                                @elseif($pairing_payer->confirm_payment === 1 && $pairing_payer->approved === 0)
                                <p class="font-weight-bold text-success text-center">
                                    You've confirmed payment has been made to this receiver along with the proof of payment, he/she will have to confirm they have received the money from you before we conclude on this investment.<br>
                                    You can contact them to hasten things up.</p>
                                <img src="{{ asset('photos/proof-of-payment/'.$pairing_payer->proof_of_payment) }}"
                                         width="600"/>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($pairing_receiver)
                    <div class="col-xl-6 col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">You have been paired to receive CFA{{ number_format($pairing_receiver->amount) }} from {{ $pairing_receiver->payer->name }}</h4>
                            </div>
                            <div class="p-2">
                                @if($timeLimit > $getSeconds)
                                    <h6 id="countdown" class="card-title text-success"></h6>
                                @else
                                    <h6 class="card-title text-danger">Their time has expired</h6>
                                @endif
                                <p>
                                    <strong>Contact them via</strong><br>
                                    <strong>Email:</strong> {{ $pairing_receiver->payer->email }}<br>
                                    <strong>Mobile:</strong> {{ $pairing_receiver->payer->mobile }}
                                </p>
                            </div>

                            @if($pairing_receiver->confirm_payment === 1 && $pairing_receiver->approved === 0)
                                <div class="p-2">
                                    <p class="font-weight-bolder">Your receiver confirmed they have paid you your money, below is the proof of payment. please click on "I HAVE RECEIVED MY MONEY"<br>
                                        <span class="text-danger">NOTE: If you don't approve receipt, we will assume you have not been paid</span></p>
                                </div>
                            <img src="{{ asset('photos/proof-of-payment/'.$pairing_receiver->proof_of_payment) }}"
                                 width="600"/>
                            <div class="card-body">

                                @include('includes.alerts')
                                <div class="basic-form">
                                    <form method="post"
                                          action="{{ route('member.approve-payment', $pairing_receiver->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                I have received my money</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                @endif

            </div>

            <div class="row">
                <div class="col-12">
                    <h4>Market Place</h4>
                </div>

                @forelse($products as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="{{ asset('photos/market-place/'.$item->image) }}">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h5>{{ $item->name }}</h5>
                                        <p><i class="fa fa-envelope"></i> {{ $item->user->email }}</p>
                                        <p><i class="fa fa-mobile"></i> {{ $item->user->mobile }}</p>
                                        <span class="bg-info p-2 text-white rounded">CFA {{ $item->price }}</span>

                                        <div class="mt-2">
                                            @if($item->user_id === Auth::user()->id)
                                                {!! $item->approved === 0 ? "<p class='bg-warning text-white'>Pending, not published</p>" : '' !!}
                                                <a class="btn btn-warning btn-sm"
                                                   href="{{ route('member.market-place.edit', $item->id) }}">Edit</a>
                                                <form method="post"
                                                      action="{{ route('member.market-place.delete', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm shadow btn-xs mb-1">Delete</button>
                                                </form>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <a href="{{ route('member.market-place') }}">
                            <button class="btn btn-info">More</button>
                        </a>
                    </div>

                @empty
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrival-content text-center mt-3">
                                        <h5>No product available</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script>
        // Get time limit and
        var count = {{ $timeLimit - $getSeconds }};
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
