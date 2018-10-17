    @extends('Templates.newTemplate')

@section('assets')
    @include('ContractsRequests.styles')
@endsection

@section('scripted')
    @include('ContractsRequests.scripts')
@endsection
@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Consignee Contract Requests
                <small class="ml-1 smCat">
                    Transactions
                </small>
            </div>
        </h1>
        <div class="detLayout">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link showPending active" data-toggle="pill" href="#" role="tab" aria-controls="pills-home" aria-selected="true">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link showAccepted" data-toggle="pill" href="#" role="tab">Accepted</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="contractPending animated fadeIn fast">
                        <div class="table-responsive">
                        @if(count($companyPending)>0)    
                            <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Company Name</th>
                                        <th class="noSortAction">Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    @foreach($companyPending as $companyPending)
                                        @if($companyPending->enumStatus == 'Pending')
                                            <tr>
                                                <td>{{$companyPending->strCompanyName}}</td><td>
                                                    <div class="ml-1 mr-1">
                                                        <button onclick="createContracts({{$companyPending->intContractListID}})" class="createContract btn btn-sm btn-success" data-toggle="tooltip" title="Add" role="button">
                                                            <i class="miniIcon fas fa-plus custSize"></i>
                                                        </button>
                                                        {{-- <button onclick="deleteBerth({{$companyPending->intContractListID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                                            <i class="miniIcon fas fa-trash custSize"></i>
                                                        </button> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Status</th>
                                        <th class="noSortAction">Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                </tbody>
                            </table>
                        @endif
                        </div>
                    </div>
                    <div class="contractRChanges animated fadeIn fast">
                        <div class="table-responsive">
                            @if(count($companyRChanges)>0)    
                                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Company Name</th>
                                            <th class="noSortAction">Action</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @foreach($companyRChanges as $companyRChanges)
                                            @if($companyRChanges->enumStatus == 'Requesting For Changes')
                                                <tr>
                                                    <td>{{$companyRChanges->strCompanyName}}</td>
                                                    <td>
                                                        <div class="ml-1 mr-1">
                                                            <button onclick="requestingForChanges({{$companyRChanges->intContractListID}})" class="btnEditRChanges btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                                                <i class="miniIcon fas fa-edit custSize"></i>
                                                            </button>
                                                            <!-- <button onclick="deleteRequestChanges({{$companyRChanges->intContractListID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                                                <i class="miniIcon fas fa-trash custSize"></i> -->
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Status</th>
                                            <th class="noSortAction">Action</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                    </tbody>
                                </table>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="contractAccepted animated fadeIn fast">
                        <div class="table-responsive">
                            @if(count($companyAccepted)>0)    
                                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Company Name</th>
                                            <th class="noSortAction">Action</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @foreach($companyAccepted as $companyAccepted)
                                            @if($companyAccepted->enumStatus == 'Accepted')
                                                <tr>
                                                    <td>{{$companyAccepted->strCompanyName}}</td>
                                                    <td>
                                                        <div class="ml-1 mr-1">
                                                            <button id="addSignatureButton" class="btn btn-sm btn-primary" data-id="{{$companyAccepted->intContractListID}}" role="button">
                                                                Sign
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Company Name</th>
                                            <th class="noSortAction">Action</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('ContractsRequests.create')
            @include('ContractsRequests.edit')
        </div>
    </section>
    @include('ContractsRequests.info')
    @include('ContractsRequests.infoSign')
@endsection