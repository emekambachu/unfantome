@extends('admin.account.layout')

@section('title')
    Admin Dashboard
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
                                            <span class="text-success">Total Users</span>
                                            <h5 class="mb-1">{{ $count['users'] }} </h5>
                                            <span class="text-success">Approved</span>
                                            <h5 class="mb-1">{{ $count['approved-users'] }} </h5>
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
                                            <span class="text-white">Number of Investments</span>
                                            <h5 class="text-white mb-1">{{ $count['payments'] }}</h5>
                                            <span class="text-white">Number of Completed Investments</span>
                                            <h5 class="text-white mb-1">{{ $count['completed-payments'] }}</h5>
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
                                            <span>Total Investments</span>
                                            <h5 class="text-white mb-1">{{ number_format($total['payments']) }}</h5>
                                            <span>Total Completed Investments</span>
                                            <h5 class="text-white mb-1">{{ number_format($total['completed-payments']) }}</h5>
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
                            <h4 class="card-title">Pair Users</h4>
                        </div>
                        <div class="card-body">
                            @include('includes.alerts')
                            <div class="basic-form">
                                <form method="post" action="{{ route('admin.pair-users') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Payer:</label>
                                        <select class="form-control mb-4" name="payer_id" id="sel1" required>
                                            @foreach($payers as $pay)
                                                <option value="{{ $pay->id }}">{{ $pay->name }} (Investment: {{ number_format($pay->pendingPayment->payment_balance) }})</option>
                                            @endforeach
                                        </select>

                                        <label>Select Receiver:</label>
                                        <select class="form-control mb-4" name="receiver_id" id="sel1" required>
                                            @foreach($receivers as $rec)
                                                <option value="{{ $rec->id }}">{{ $rec->name }} (Balance: {{ number_format($rec->pendingReturn->return_balance) }})</option>
                                            @endforeach
                                        </select>

                                        <label>Time Limit (Hours):</label>
                                        <input type="number" class="form-control mb-4" name="time_limit" value="" required>

                                        <button type="submit" class="btn btn-primary">Pair</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>NAME</strong></th>
                                        <th><strong>Contact</strong></th>
                                        <th><strong>Referrals</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <strong>Email:</strong> {{ $user->email }}<br>
                                            <strong>Mobile:</strong> {{ $user->mobile }}
                                        </td>
                                        <td>
                                            <strong>Referral code:</strong> {{ $user->referral_code }}<br>
                                            <strong>Referee:</strong> {{ $user->referee }}<br>
                                        </td>
                                        <td>
                                            <strong>Approval:</strong> {{ $user->approved ? 'Approved' : 'Un-approved' }}<br>
                                            <strong>Paired:</strong> {{ $user->paired ? 'Paired' : 'Not Paired' }}<br>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('j F, Y') }}</td>
                                        <td>
                                            <div class="">
                                                <form method="post" action="{{ route('admin.approve-user', $user->id) }}">
                                                    @csrf
                                                    <button class="btn btn-primary shadow btn-xs mb-1">
                                                        {{ $user->approved ? 'un-approve' : 'approve' }}</button>
                                                </form>
                                                <form method="post" action="{{ route('admin.delete-user', $user->id) }}">
                                                    @csrf
                                                    <button class="btn btn-danger shadow btn-xs">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Payments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>NAME</strong></th>
                                        <th><strong>Contact</strong></th>
                                        <th><strong>Amount/Balance</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Date</strong></th>
{{--                                        <th><strong>Action</strong></th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($payments as $item)
                                        <tr>
                                            <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                            </td>
                                            <td>{{ $item->user->name ?? '' }}</td>
                                            <td>
                                                <strong>Email:</strong> {{ $item->user->email }}<br>
                                                <strong>Mobile:</strong> {{ $item->user->mobile }}
                                            </td>
                                            <td>
                                                <strong>Invested:</strong> {{ $item->amount }}<br>
                                                <strong>Balance:</strong> {{ $item->payment_balance }}<br>
                                            </td>
                                            <td>
                                                <strong>Paid:</strong> {{ $item->approved ? 'Yes' : 'No' }}<br>
                                                <strong>Completed returns:</strong> {{ $item->completed_returns ? 'Yes' : 'No' }}<br>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</td>
{{--                                            <td>--}}
{{--                                                <div class="">--}}
{{--                                                    <form method="post" action="{{ route('admin.approve-user', $user->id) }}">--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="btn btn-primary shadow btn-xs mb-1">--}}
{{--                                                            {{ $user->approved ? 'un-approve' : 'approve' }}</button>--}}
{{--                                                    </form>--}}
{{--                                                    <form method="post" action="{{ route('admin.delete-user', $user->id) }}">--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="btn btn-danger shadow btn-xs">Delete</button>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Pairings</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Amount</strong></th>
                                        <th><strong>Proof of payment</strong></th>
                                        <th><strong>Time limit</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Date</strong></th>
{{--                                        <th><strong>Action</strong></th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($pairings as $item)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <strong>Payer:</strong> {{ $item->payer->name }}<br>
                                            <strong>Payer Email:</strong> {{ $item->payer->email }}<br>
                                            <strong>Receiver:</strong> {{ $item->receiver->name ?? '' }}<br>
                                            <strong>Receiver Email:</strong> {{ $item->receiver->email ?? '' }}<br>
                                        </td>
                                        <td>
                                            <strong>Amount:</strong> {{ $item->amount }}
                                        </td>
                                        <td>
                                            @if(!empty($item->proof_of_payment))
                                            <img src="{{ asset('photos/proof-of-payment/'.$item->proof_of_payment) }}"/>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->time_limit }} Hours
                                        </td>
                                        <td>
                                            {{ $item->approved ? 'Paid' : 'Pending' }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</td>
{{--                                        <td>--}}
{{--                                            <div class="">--}}
{{--                                                <form method="post" action="{{ route('admin.approve-user', $user->id) }}">--}}
{{--                                                    @csrf--}}
{{--                                                    <button class="btn btn-primary shadow btn-xs mb-1">--}}
{{--                                                        {{ $user->approved ? 'un-approve' : 'approve' }}</button>--}}
{{--                                                </form>--}}
{{--                                                <form method="post" action="{{ route('admin.delete-user', $user->id) }}">--}}
{{--                                                    @csrf--}}
{{--                                                    <button class="btn btn-danger shadow btn-xs">Delete</button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
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
