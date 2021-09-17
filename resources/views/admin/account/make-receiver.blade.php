@extends('admin.account.layout')

@section('title')
    Make receiver
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
                <div class="col-md-12">
                    @include('includes.alerts')
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Make {{ $user->name }} a receiver</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="{{ route('admin.make-receiver.invest', $user->id) }}">
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
            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
