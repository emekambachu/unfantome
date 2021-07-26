@extends('members.account.layout')

@section('title')
    Market Place
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
            <div class="col-12">
                <h4>Market Place</h4>
                @include('includes.alerts-admin')
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
                                        {!! $item->approved === 0 ? "<p class='bg-warning text-white'>Pending, not published</p>" : '' !!}

                                        @if($item->approved)
                                            <form method="post"
                                                  action="{{ route('admin.market-place.approve', $item->id) }}">
                                                @csrf
                                                <button class="btn btn-danger btn-sm shadow btn-xs mb-1">Block</button>
                                            </form>
                                        @else
                                            <form method="post"
                                                  action="{{ route('admin.market-place.approve', $item->id) }}">
                                                @csrf
                                                <button class="btn btn-success btn-sm shadow btn-xs mb-1">Publish</button>
                                            </form>
                                        @endif

                                        <form method="post"
                                              action="{{ route('admin.market-place.delete-product', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm shadow btn-xs mb-1">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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

            <div class="col-12 text-center">
                @if(isset($products) && $products->lastPage() > 1)
                    {{ $products->appends(Request::all())->links() }}
                @endif
            </div>

        </div>
    </div>
</div>
@endsection

@section('bottom-assets')
@endsection
