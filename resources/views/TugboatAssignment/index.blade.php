@extends('Templates.newTemplate')

@section('assets')
    @include('TugboatAssignment.scripts')
@endsection

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Tugboat Assignment
                <small class="smCat">Dispatch &amp; Hauling</small>
            </div>
        </h1>
            <div class="tugboatAssignment animated fadeIn">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <section class="sectionDark">
                                <div class="container">
                                    <h5 class="section-header text-center" style="text-transform: uppercase;">
                                    Tugboat List 
                                    <a href="tugboat.html" class="float-right btn-sm btn btn-primary waves-effect"data-toggle="tooltip" title="Add new Tugboat"><i class="fas fa-plus"></i></a>
                                    </h5>
                                </div>
                                @if(count($tugboat)>0)
                                    @foreach($tugboat as $tugboat)
                                        @if($tugboat->enumStatus == 'Available') 
                                            <div class="row">
                                                <div class="col mr-3 ml-3">
                                                    <a href="#">
                                                        <div class="card border border-success" style="outline-width: 100px;">
                                                            <div class="card-header ">
                                                                <h6 class="text-center mt-2">{{$tugboat->strName}}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @elseif($tugboat->enumStatus == 'Occupied')
                                            <div class="row">
                                                <div class="col mr-3 ml-3">
                                                    <a href="#">
                                                        <div class="card border border-info">
                                                            <div class="card-header ">
                                                                <h6 class="text-center mt-2">{{$tugboat->strName}}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </section>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <section class="sectionDark">
                                <div class="container">
                                    <h5 class="section-header text-center" style="text-transform: uppercase;">
                                    Job Order  List  
                                    </h5>
                                </div>
                                <div class="container">
                                    @if(count($scheduledjob) > 0)
                                        @foreach($scheduledjob as $scheduledjob)
                                            <div class="col-lg-12">
                                                <div class="card card-sm-2 card-primary border-primary">
                                                    <div class="card-icon">
                                                        <i class="ion ion-android-boat text-primary"></i>
                                                    </div>
                                                    <div class="card-header">
                                                        <h4 class="text-primary mb-2">Job Order # {{$scheduledjob->intJobOrderID}}</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5>{{$scheduledjob->strCompanyName}}</h5>
                                                    </div>
                                                    <div class="card-footer mt-2">
                                                        <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                        <button onclick="showTugboatModal({{$scheduledjob->intJobOrderID}})" class="btn btn-primary btn-sm text-center float-right ml-2 waves-effect">Assign Tugboat</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </h1>
    </section>
    @include('TugboatAssignment.assignmodal')
@endsection