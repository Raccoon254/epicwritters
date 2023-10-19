<!--Check if there are any messages within the session-->
@if(session('success'))
    <div class="alert rounded mt-3 alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert rounded-[0px] text-white border-0 mt-3 bg-red-500 alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert rounded-[0px] mt-3 bg-red-500 alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
