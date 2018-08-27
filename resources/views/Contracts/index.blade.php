@extends('Templates.newTemplate')

@section('assets')
    @include('Contracts.styles')
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
    <div id="detLayout" class="detLayout mt-3">
        <div class="mt-3">
            @if(count($company)>0)    
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
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
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
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
@endsection