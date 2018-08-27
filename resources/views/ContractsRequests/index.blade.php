@extends('Templates.newTemplate')

@section('assets')
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
        <div id="detLayout" class="detLayout mt-3">
            <div class="mt-3">
                @if(count($company)>0)    
                    <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Company Name</th>
                                <th>Status</th>
                                <th class="noSortAction">Action</th>
                            </tr>
                        </thead>  
                        <tbody>
                            @foreach($company as $company)
                                @if($company->enumStatus == 'Requesting For Changes')
                                    <tr>
                                        <td>{{$company->strCompanyName}}</td>
                                        <td><span class="badge badge-info">{{$company->enumStatus}}</span></td>
                                        <td>
                                            <div class="ml-1 mr-1">
                                                <button onclick="getBerth({{$company->intContractListID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                                    <i class="miniIcon fas fa-edit custSize"></i>
                                                </button>
                                                <button onclick="deleteBerth({{$company->intContractListID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                                    <i class="miniIcon fas fa-trash custSize"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @elseif($company->enumStatus == 'Pending')
                                    <tr>
                                        <td>{{$company->strCompanyName}}</td>
                                        <td><span class="badge badge-danger">{{$company->enumStatus}}</span></td>
                                        <td>
                                            <div class="ml-1 mr-1">
                                                <button onclick="createContracts({{$company->intContractListID}})" class="btn btn-sm btn-success" data-toggle="tooltip" title="Add" role="button">
                                                    <i class="miniIcon fas fa-plus custSize"></i>
                                                </button>
                                                <button onclick="getBerth({{$company->intContractListID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                                    <i class="miniIcon fas fa-edit custSize"></i>
                                                </button>
                                                <button onclick="deleteBerth({{$company->intContractListID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                                    <i class="miniIcon fas fa-trash custSize"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @elseif($company->enumStatus == 'Accepted')
                                    <tr>
                                        <td>{{$company->strCompanyName}}</td>
                                        <td><span class="badge badge-success">{{$company->enumStatus}}</span></td>
                                        <td>
                                            <div class="ml-1 mr-1">
                                                <button onclick="createActiveContract({{$company->intContractListID}})" class="btn btn-sm btn-success" data-toggle="tooltip" title="Finalize Quotation as Contract" role="button">
                                                    <i class="miniIcon fas fa-check custSize"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                        <thead class="thead-dark">
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
        @include('ContractsRequests.create')
    </section>
    @include('ContractsRequests.info')
@endsection