@if(session('success'))
    <div class="alert alert-success alert-dismissable" style="width: 80%; margin: 0 auto;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-danger alert-dismissable" style="width: 80%; margin: 0 auto;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session('warning') }}
    </div>
@endif

@if(count($errors) > 0)
    <div style="width: 50%; margin: 10px auto;" align="center" class="notification error closeable" role="alert">
        <ul style="list-style: none;">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
