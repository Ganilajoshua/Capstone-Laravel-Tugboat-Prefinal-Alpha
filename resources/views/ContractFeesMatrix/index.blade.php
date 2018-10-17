@extends('Templates.newTemplate')

@section('assets')
    @include('ContractFeesMatrix.styles')
@endsection
@section('scripted')
    @include('ContractFeesMatrix.scripts')
@endsection
@section('content')
<section id="mainSection" class="section">
    <h1 class="section-header">
        <div>
        Contract Fees Matrix
        <small class="ml-1 smCat">
            Utilities
        </small>
        </div>
    </h1>
    <div class="animated fadeIn cardContractMatrix">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pillsHaulingMatrix-tab" data-toggle="pill" href="#pillsHaulingMatrix" role="tab" aria-controls="pillsHaulingMatrix" aria-selected="true">Hauling Service Matrix</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pillsTugAssistMatrix-tab" data-toggle="pill" href="#pillsTugAssistMatrix" role="tab" aria-controls="pillsTugAssistMatrix" aria-selected="false">Tug Assist Service Matrix</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pillsHaulingMatrix" role="tabpanel" aria-labelledby="pillsHaulingMatrix-tab">
                                    <div class="table-responsive">
                                        <table class="table-striped text-center contractFeeMatrixTable border-primary" style="width:100%;">
                                            <thead class="bg-primary text-white">
                                                <th style="width:30%"></th>
                                                <th style="width:35%">Hauling Service Matrix</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold">Standard Rate</td>
                                                    {{-- <td>{{$Hauling->fltCFStandardRate}}</td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Tugboat Delay Fee</td>
                                                    {{-- <td>{{$Hauling->fltCFDelayFee}}</td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Violation Fee</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Consignee Late Fee</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Minimum Damage Fee</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Maximum Damage Fee</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <button data-id="{{$Hauling->intContractFeesID}}" class="btnEditHaulingMatrix btn btn-primary btn-sm waves-effect mb-3">Edit Hauling Matrix</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="pillsTugAssistMatrix" role="tabpanel" aria-labelledby="pillsTugAssistMatrix-tab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('ContractFeesMatrix.haulingFees')
@include('ContractFeesMatrix.tugAssistFees')
</section>
@endsection
