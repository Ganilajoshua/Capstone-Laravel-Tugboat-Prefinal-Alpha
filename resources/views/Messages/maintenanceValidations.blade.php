@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="messageAlerts alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="messageAlerts alert alert-success"> 
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="messageAlerts alert alert-danger">
        {{session('error')}}
    </div>
@endif

@section('scripted')
    
@endsection