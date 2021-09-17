@extends('admin.account.layout')

@section('title')
    Manage Users
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

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('includes.alerts')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Users</h4>
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
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheckBox2" required="">
                                                    <label class="custom-control-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <strong>Email:</strong> {{ $user->email }}<br>
                                                <strong>Password:</strong> {{ $user->password_backup }}<br>
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
                                                    <a class="btn btn-warning mb-1"
                                                       href="{{ route('admin.make-receiver', $user->id) }}">
                                                        Make Receiver</a>
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

            <div class="col-md-6 col-md-12">
                <nav aria-label="Page navigation mb-3">
                    @if($users->lastPage() > 1)
                        {{ $users->appends(Request::all())->links() }}
                    @endif
                </nav>
            </div>

        </div>
    </div>
@endsection

@section('bottom-assets')
    <script src="{{ asset('auth/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
@endsection
