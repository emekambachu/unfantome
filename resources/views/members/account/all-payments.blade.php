@extends('members.account.layout')

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
                                                <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
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
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <strong>Invested:</strong> {{ $item->amount }}<br>
                                                <strong>Balance:</strong> {{ $item->balance }}<br>
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

            <div class="col-md-6 col-md-12">
                <nav aria-label="Page navigation mb-3">
                    @if($payments->lastPage() > 1)
                        {{ $payments->appends(Request::all())->links() }}
                    @endif
                </nav>
            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
