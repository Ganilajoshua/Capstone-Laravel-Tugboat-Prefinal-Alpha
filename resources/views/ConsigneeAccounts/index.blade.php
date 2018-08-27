@extends('Templates.newTemplate')

@section('assets')
    @include('ConsigneeAccounts.styles')
    @include('Employees.scripts')
@endsection
@section('assets2')
    
@endsection
@section('content')
<section id="mainSection" class="section">
    <h1 class="section-header">
        <div>
        Consignee Accounts
        <small class="ml-1 smCat">
            Transactions
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link showCRequests active" data-toggle="pill" href="#" role="tab" aria-controls="pills-home" aria-selected="true">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link showCActive" data-toggle="pill" href="#" role="tab" aria-selected="false">Active</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                    <div class="consigneeRequests animated zoomIn fast">
                        
                        <div class="table-responsive">
                            <table class="detailedTable table table-striped table-bordered text-center mainTable" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Consignee</th>
                                        <th>Email</th>
                                        <th class="noSortAction">Status</th>
                                        <th class="noSortAction">Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                        <tr>
                                            <td></td>
                                            <td><span class="block-email"><a href="#"></a></span></td>
                                            <td> 
                                                <div class="checkbox activate ml-3">
                                                    <label>
                                                        <input type="checkbox" id="checkboxStatus" data-size="small" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive">
                                                    </label>
                                                </div> 
                                            </td>
                                            <td>
                                                <div class="ml-1 mr-1">
                                                    <button class="gotoInvoices btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                                        <i class="bigIcon ion ion-ios-eye"></i>
                                                    </button>
                                                </div>  
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="consigneeActive animated zoomIn fast">
                        @if(count($user)>0)    
                        <div class="table-responsive">
                            <table class="detailedTable table table-striped table-bordered text-center mainTable" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Consignee</th>
                                        <th>Email</th>
                                        <th class="noSortAction">Status</th>
                                        <th class="noSortAction">Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    @foreach($user as $user)
                                        <tr>
                                            <td>{{$user->strCompanyName}}</td>
                                            <td><span class="block-email"><a href="mailto:{{$user->email}}">{{$user->email}}</a></span></td>
                                            <td> 
                                                {{-- <div class="checkbox activate" data-id="{{$user->id}}">
                                                    <label>
                                                        <input type="checkbox" id="checkboxStatus" data-size="small" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$user->id}}">
                                                    </label>
                                                </div> --}}
                                                @if($user->isActive == 0)
                                                    <div class="checkbox ml-3" data-id="{{$user->id}}">
                                                        <label>
                                                            <input type="checkbox" id="checkboxStatuss" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$user->id}}">
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="checkbox ml-3" data-id="{{$user->id}}" checked>
                                                        <label>
                                                            <input type="checkbox" checked id="checkboxStatuss" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$user->id}}">
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td style="width:15%">
                                                <div class="ml-1 mr-1">
                                                    <button class="gotoInvoices btn btn-sm btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                                        <i class="bigIcon ion ion-ios-eye"></i>
                                                    </button>
                                                </div>  
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Consignee</th>
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
</section>
{{-- @include('Employees.create')
@include('Employees.edit') --}}
@endsection
