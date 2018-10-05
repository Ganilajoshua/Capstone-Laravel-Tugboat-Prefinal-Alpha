@extends('Templates.newTemplate')

@section('assets')
    @include('Contracts.styles')
@endsection

@section('scripted')
    @include('Contracts.scripts')
@endsection

@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
            Active Contracts
            <small class="ml-1 smCat">
                Transactions
            </small>
        </div>
    </h1>
    <div class="detLayout">
        <div class="card card-primary">
            <div class="card-header">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link showPending active" data-toggle="pill" href="#contractActivationRequestTab" role="tab" aria-controls="pills-home" aria-selected="true">Contract Activation Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link showRChanges" data-toggle="pill" href="#activeContractTab" role="tab" aria-selected="false">Active Contracts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link showAccepted" data-toggle="pill" href="#renewContractTab" role="tab">Contract Renewals</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="contractActivationRequestTab" role="tabpanel" aria-labelledby="contractActivationRequestTab-tab">
                    </div>
                    <div class="tab-pane fade" id="activeContractTab" role="tabpanel" aria-labelledby="activeContractTab-tab">
                        <div class="animated fadeIn fast">
                            <div class="table-responsive">
                                @if(count($company)>0)    
                                    <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>Company Name</th>
                                                <th class="noSortAction">Action</th>
                                            </tr>
                                        </thead>  
                                        <tbody>
                                            @foreach($company as $company)
                                                <tr>
                                                    <td>{{$company->strCompanyName}}</td>
                                                    <td>
                                                        <div class="ml-1 mr-1">
                                                            <button onclick="getBerth({{$company->intCompanyID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                                                <i class="miniIcon fas fa-edit custSize"></i>
                                                            </button>
                                                            <button onclick="deleteBerth({{$company->intCompanyID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                                                <i class="miniIcon fas fa-trash custSize"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
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
                    <div class="tab-pane fade" id="renewContractTab" role="tabpanel" aria-labelledby="renewContractTab-tab">xd</div>
                </div>
            </div>
        </div>
    </div>
@endsection