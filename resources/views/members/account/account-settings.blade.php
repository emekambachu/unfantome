@extends('members.account.layout')

@section('title')
    Account Settings
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
                            <h4 class="card-title">Update your account</h4>
                        </div>
                        <div class="card-body">
                            @include('includes.alerts')
                            <div class="basic-form">
                                <form method="post" action="{{ route('member.account-settings.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control mb-4" name="name"
                                               value="{{ Auth::user()->name }}" required>

                                        <label>Email:</label>
                                        <input type="email" class="form-control mb-4" name="email"
                                               value="{{ Auth::user()->email }}" required>

                                        <label>Mobile:</label>
                                        <input type="text" class="form-control mb-4" name="mobile"
                                               value="{{ Auth::user()->mobile }}" required>

                                        <label>Password:</label>
                                        <input type="password" class="form-control mb-4" name="mobile" autocomplete="false">

                                        <label>Mode of payment</label>
                                        <select class="form-control mb-4" name="mode_of_payment" id="sel1" required>
                                            <option selected value="{{ Auth::user()->mode_of_payment }}">{{ Auth::user()->mode_of_payment }}</option>
                                            @if(Auth::user()->mode_of_payment === 'Orange Money')
                                            <option value="Zamani Money">Zamani Money</option>
                                            @else
                                            <option value="Orange Money">Orange Money</option>
                                            @endif
                                        </select>

                                        <label>Image:</label>
                                        <input type="file" class="form-control mb-4" name="image">

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
