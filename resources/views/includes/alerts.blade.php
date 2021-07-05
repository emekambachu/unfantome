@if(session('success'))
    <div class="alert alert-success alert-dismissable text-center" style="width: 70%; margin: 4px auto;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session('success') }}
    </div>
    @endif

@if(session('warning'))
    <div class="alert alert-danger alert-dismissable text-center" style="width: 70%; margin: 6px auto;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session('warning') }}
    </div>
@endif

{{--@if(count($errors) > 0)--}}
{{--    <div class="alert alert-danger alert-dismissable" style="width: 80%; margin: 0 auto;">--}}
{{--        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>--}}
{{--        <ul style="list-style: none; margin: 0 auto;">--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

@if ($errors->any())
    <div class="alert alert-danger alert-dismissable text-center" style="width: 80%; margin: 0 auto;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <ul style="list-style: none; margin: 0 auto;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
