@extends('Templates.newTemplate')

@section('assets')
    @include('Joborder.styles')
@endsection
@section('scripted')
    @include('Joborder.scripts')
@endsection
@section('content')
    <section id="mainSection" class="section">
        <h1 class="section-header">
            <div>
            Job Orders
            <small class="ml-1 smCat">
                Dispatch &amp; Hauling
            </small>
            </div>
        </h1>
        <div class="animated fadeIn jobOrderList">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="float-left">
                                <div class="dropdown" id="jobOrderChoices">
                                    <button class="btn btn-primary dropdown-toggle waves-effect" type="button" id="ddJobOrder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Created Job Orders
                                    </button>
                                    <div class="dropdown-menu text-center" aria-labelledby="ddJobOrder">
                                        <a id="createdJO" class="dropdown-item waves-effect active" href="/administrator/transactions/dispatchandhauling/joborders/acceptedjoborders">Created</a>
                                        <a id="pendingJO" class="dropdown-item waves-effect" href="/administrator/transactions/dispatchandhauling/joborders">Pending</a>
                                        <a id="forwardJO" class="dropdown-item waves-effect" href="/administrator/transactions/dispatchandhauling/joborders/forwardedjoborders">Forwarded</a>
                                        <a id="declinedJO" class="dropdown-item waves-effect" href="/administrator/transactions/dispatchandhauling/joborders/declinedjoborders">Declined</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="float-right">
                                <button class="btn btn-primary text-center waves-effect btnAddJO">
                                    Add Job Order
                                </button>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(count($accepted)>0)
                                    @foreach($accepted as $accepted)
                                        <div class="col-12 col-sm-12 col-lg-6 createdCards">
                                            <div class="card card-sm-2 card-primary border-primary">
                                                <div class="card-icon">
                                                    <i class="ion ion-android-boat text-primary"></i>
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="text-primary mb-2">Job Order # {{$accepted->intJobOrderID}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h5>{{$accepted->strCompanyName}}</h5>
                                                </div>
                                                <div class="card-footer mt-2">
                                                    <a href="#" data-id="{{$accepted->intJobOrderID}}" class="joborderMoreInfoButton">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                    <button class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#forwardModal">Forward</button>
                                                    <button onclick="createJobsched({{$accepted->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right waves-effect">Make Job Schedule</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @elseif(count($accepted) == 'null' || 0)
                                @endif
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="forwardfooter">
            
        </div>
    </section>
@endsection

@section('outside')
    @include('Joborder.info')
    {{-- @include('Joborder.declined') --}}
@endsection