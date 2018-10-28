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
            <div class="card-body">
                <div class="animated fadeIn fast">
                    <div class="table-responsive">
                        @if(count($company)>0)    
                            <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Contract Expiry</th>
                                        <th>Status</th>
                                        <th class="noSortAction">Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    @foreach($company as $company)
                                        <tr>
                                            <td>{{$company->strCompanyName}}</td>
                                            <td>{{$company->datContractExpire}}</td>
                                            <td>
                                                <span class="badge badge-success"> Active</span>
                                            </td>
                                            <td>
                                                <div class="ml-1 mr-1">
                                                    <button class="btn btn-sm btn btn-primary waves-effect waves-circle" data-toggle="tooltip" title="View Details">
                                                        <i class="fas fa-eye"></i>
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
        </div>
    </div>
@endsection