@extends('admin.account.layout')

@section('title')
    Investments
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

                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-12">
                            <div class="card bg-success	overflow-hidden">
                                <div class="card-body pb-0 px-4 pt-4">
                                    <div class="row">
                                        <div class="col">
                                            <span class="text-white">Number of Investments</span>
                                            <h5 class="text-white mb-1">{{ $countInvestments }}</h5>
                                            <span class="text-white">Number of Completed Investments</span>
                                            <h5 class="text-white mb-1">{{ $countCompletedReturns }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-wrapper" style="width:100%">
                                    <span class="peity-line" data-width="100%">6,2,8,4,3,8,4,3,6,5,9,2</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-12">
                            <div class="card bg-primary overflow-hidden">
                                <div class="card-body pb-0 px-4 pt-4">
                                    <div class="row">
                                        <div class="col text-white">
                                            <span>Total Investments</span>
                                            <h5 class="text-white mb-1">{{ number_format($totalInvestments) }}</h5>
                                            <span>Total Completed Investments</span>
                                            <h5 class="text-white mb-1">{{ number_format($totalCompletedReturns) }}</h5>
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
                <div class="col-12">
                    @include('includes.alerts')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Investments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="checkAll" required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>User</strong></th>
                                        <th><strong>Amount/Balance</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($investments as $item)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            <strong>Invested:</strong> {{ number_format($item->amount) }}<br>
                                            <strong>Pending Payment:</strong> {{ number_format($item->payment_balance) }}<br>
                                            <strong>Pending Return:</strong> {{ number_format($item->return_balance) }}
                                        </td>
                                        <td>
                                            <strong>Paired:</strong> {{ $item->user->paired === 1 ? 'Yes' : 'No' }}<br>
                                            <strong>Paid:</strong> {{ $item->approved ? 'Yes' : 'No' }}<br>
                                            <strong>Completed returns:</strong> {{ $item->completed_returns ? 'Yes' : 'No' }}<br>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</td>
                                        <td>
                                            <form method="post" action="{{ route('admin.investment.delete', $item->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger shadow btn-xs" type="submit">Delete</button>
                                            </form>
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

            <div class="col-md-6 col-md-12">
                <nav aria-label="Page navigation mb-3">
                    @if($investments->lastPage() > 1)
                        {{ $investments->appends(Request::all())->links() }}
                    @endif
                </nav>
            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
