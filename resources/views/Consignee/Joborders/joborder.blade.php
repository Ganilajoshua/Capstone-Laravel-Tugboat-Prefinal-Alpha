@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Joborders.styles')
@endsection
@section('pakingshet')
    @include('Consignee.Joborders.scripts')
@endsection
@section('content')
    @if(count($contract) == null)
        <section class="statistic statistic2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8" style="margin-left: auto; margin-right:auto;">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix mt-4">
                                    <div class="icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="text">
                                        <h2>Section Disabled At The Moment</h2>
                                        <span>You have no Contracts</span>
                                        <div class="mb-5">
                                            <a href="/consignee/contracts" class="text-white mt-5">
                                                    Request a Contract now
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($contract[0]->enumStatus == 'Active')
        <input type="hidden">
            <section style="margin-bottom : 80px;">
                <div class="container" style="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-pills flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="navFirstTab" data-toggle="tab" href="#firstTab" role="tab" aria-selected="true">Add Job Order</a>
                                                </li>
                                                <hr>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="navSecondTab" data-toggle="tab" href="#secondTab" role="tab" aria-selected="true">Created Job Orders</a>
                                                </li>
                                                <hr>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="navThirdTab" data-toggle="tab" href="#thirdTab" role="tab" aria-selected="false">Pending Requests<span class="badge badge-danger ml-2">17</span></a>
                                                </li>
                                                <hr>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="navFourthTab" data-toggle="tab" href="#fourthTab" role="tab" aria-selected="true">Ongoing Job Order /s</a>
                                                </li>
                                                <hr>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="navFifthTab" data-toggle="tab" href="#fifthTab" role="tab" aria-selected="false">Job Order History</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="card" id="cardJO">
                                        <div class="card-header bg-primary text-white text-center">
                                            <a href="#" class="btnGoToChoices btn btn-lg btn-link btn-sm float-left" data-toggle="tooltip"  title="Back" role="button">
                                                <i class="ion-chevron-left text-white"></i>
                                            </a>
                                            <div class="text-center" id="titleJO">Add Job Order</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <!-- Add Job Order Choose Service-->
                                                @include('Consignee.Joborders.chooseservice')
                                                <!-- Created Job Orders -->
                                                @include('Consignee.Joborders.createdjoborders')
                                                <!-- Pending Job Orders -->
                                                @include('Consignee.Joborders.joborderrequests')
                                                <!-- Ongoing Job Orders -->
                                                @include('Consignee.Joborders.ongoingjoborders')                                                <!-- Job Order History -->
                                                <!-- Job Order History -->
                                                @include('Consignee.Joborders.joborderhistory')
                                            </div>
                                        </div>
                                        <div class="card-footer text-right paginateJO">
                                            <nav class="d-inline-block">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @elseif($contract[0]->enumStatus == 'Expired')
        <section class="statistic statistic2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8" style="margin-left: auto; margin-right:auto;">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix mt-4">
                                    <div class="icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="text">
                                        <h2>Section Disabled At The Moment</h2>
                                        <span>You have no Contracts</span>
                                        <div class="mb-5">
                                            <a href="/consignee/contracts" class="text-white mt-5">
                                                    Request a Contract now
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container">
            <div class="col">
                <div class="card card-sm-2 card-primary border-primary">
                    <div class="card-icon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <h4 class="text-primary mb-2"> {{Auth::user()->name}} </h4>
                    </div>
                    <div class="card-body">
                        <h3>CONTRACT REQUEST Processing</h3>
                        <div style="font-size: 18px;" class="mt-4 badge badge-warning text-black disabled">
                            Waiting for Response . . .
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
