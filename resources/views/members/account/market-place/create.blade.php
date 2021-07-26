@extends('members.account.layout')

@section('title')
    Add product
@stop

@section('top-assets')
    <!-- Custom Stylesheet -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
                                            <h5 class="mb-1"></h5>
                                            <span class="text-success">My Products</span>
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
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="{{ route('member.market-place.store') }}"
                                      enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control mb-4" name="name"
                                                   value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="number" class="form-control mb-4" name="price"
                                                   value="{{ old('price') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea name="description" class="form-control mb-4" required>
                                            {{ old('description') }}</textarea>
                                            <script>
                                                CKEDITOR.replace( 'description' );
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image (Required Max:5mb):</label>
                                            <input type="file" class="form-control mb-4" name="image" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Second Image (Optional Max:5mb):</label>
                                            <input type="file" class="form-control mb-4" name="image_two">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Third Image (Optional Max:5mb):</label>
                                            <input type="file" class="form-control mb-4" name="image_three">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
