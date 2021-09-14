@extends('admin.account.layout')

@section('title')
    Pairings
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
                                                <option value="{{ $pay->id }}">{{ $pay->name }} (Investment: {{ number_format($pay->pendingPayment->amount) }})</option>
                                            @endforeach
                                        </select>

                                        <label>Select Receiver:</label>
                                        <select class="form-control mb-4" name="receiver_id" id="sel1" required>
                                            @foreach($receivers as $rec)
                                                <option value="{{ $rec->id }}">{{ $rec->name }} (Balance: {{ number_format($rec->pendingReturn->balance) }})</option>
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
                            <h4 class="card-title">Pairings</h4>
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
                                        <th><strong>Action</strong></th>
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
                                                <strong>Receiver:</strong> {{ $item->receiver->name }}<br>
                                                <strong>Receiver Email:</strong> {{ $item->receiver->email }}<br>
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
                                            <td>
                                                <form method="post" action="{{ route('admin.pairing.delete', $item->id) }}">
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
                    @if($pairings->lastPage() > 1)
                        {{ $pairings->appends(Request::all())->links() }}
                    @endif
                </nav>
            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
