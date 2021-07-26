@extends('members.account.layout')

@section('title')
    Edit Product
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
                <div class="col-md-12">
                    @include('includes.alerts')
                </div>
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="{{ route('member.market-place.update', $product->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input type="text" class="form-control mb-4" name="name"
                                                       value="{{ $product->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price:</label>
                                                <input type="number" class="form-control mb-4" name="price"
                                                       value="{{ $product->price }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea name="description" class="form-control mb-4" required>
                                            {{ $product->description }}</textarea>
                                                <script>
                                                    CKEDITOR.replace( 'description' );
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Image (Required):</label>
                                                <input type="file" class="form-control mb-4" name="image">
                                            </div>
                                            <img width="100" src="{{ asset('photos/market-place/'.$product->image) }}"/>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Second Image (Optional):</label>
                                                <input type="file" class="form-control mb-4" name="image_two">
                                            </div>
                                            @if(!empty($product->image_two))
                                                <img width="100"
                                                     src="{{ asset('photos/market-place/'.$product->image_two) }}"/>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Third Image (Optional):</label>
                                                <input type="file" class="form-control mb-4" name="image_three">
                                            </div>
                                            @if(!empty($product->image_three))
                                                <img width="100"
                                                     src="{{ asset('photos/market-place/'.$product->image_three) }}"/>
                                            @endif
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
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
