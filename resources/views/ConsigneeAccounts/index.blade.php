@extends('Templates.newTemplate')

@section('assets')
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
    <div id="detLayout" class="detLayout mt-3">
        <div class="mt-3">
            @if(count($user)>0)    
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Consignee</th>
                            <th>Email</th>
                            <th>Status</th>
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
                                            <input type="checkbox" id="checkboxStatus" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$user->id}}">
                                        </label>
                                    </div> --}}
                                    @if($user->isActive == 0)
                                        <div class="checkbox" data-id="{{$user->id}}">
                                            <label>
                                                <input type="checkbox" id="checkboxStatuss" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$user->id}}">
                                            </label>
                                        </div>
                                    @else
                                        <div class="checkbox" data-id="{{$user->id}}" checked>
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
            @else
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
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
</section>
{{-- @include('Employees.create')
@include('Employees.edit') --}}
@endsection
