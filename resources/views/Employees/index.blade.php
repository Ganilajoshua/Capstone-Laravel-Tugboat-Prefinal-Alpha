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
        Employees
        <small class="ml-1 smCat">
            Maintenance
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout mt-3">
        <button id="addEmployeeButton" class="detAdd btn btn-primary text-center border-dark bounceIn animated">
            Add
        </button>
        <div class="mt-3">
            @if(count($employees)>0)    
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Employees</th>
                            <th>Position</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($employees as $employees)
                            <tr>
                                <td>{{$employees->strLName}}, {{$employees->strFName}} {{$employees->strMName}}</td>
                                <td>{{$employees->strPositionName}}</td>
                                <td>
                                    <div class="ml-1 mr-1">
                                        <button onclick="getEmployees({{$employees->intEmployeeID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                            <i class="miniIcon fas fa-edit custSize"></i>
                                        </button>
                                        <button onclick="deleteEmployees({{$employees->intEmployeeID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
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
                            <th>Employees</th>
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
@include('Employees.create')
@include('Employees.edit')
@endsection
