@extends('Templates.newTemplate')

@section('assets')
    @include('Administrator.styles')
@endsection

@section('scripted')
    @include('Administrator.scripts')
@endsection

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>Dashboard</div>
        </h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">Weather Forecast</div>
                    <div class="card-body">
                        <div id="weather"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header p-0 bg-primary">
                        <div class="card card-sm-3 p-0 bg-primary m-0">
                            <div class="card-icon bg-white">
                                <i class="ion ion-android-boat text-primary"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                <a data-collapse="#ongoingJOCard" class="btn btn-icon text-white float-right"><i class="ion ion-minus"></i></a>
                                    <h4 class="text-white" style="color:#fff !important;">Ongoing Job Orders</h4>
                                </div>
                                <div class="card-body mt-1 text-white" style="font-size:25px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse show" id="ongoingJOCard">
                        <div class="card-body m-0">
                            <div class="row">
                                @foreach($ongoing as $ongoing)
                                <div class="col-12 col-sm-12 col-lg-4 pendingCards">
                                    <div class="card card-sm-2 card-primary border-primary">
                                        <div class="card-icon">
                                            <i class="ion ion-android-boat text-primary"></i>
                                        </div>
                                        <div class="card-header">
                                            <h4 class="text-primary mb-2">Job Order # {{$ongoing->intJobOrderID}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h3><a href="/administrator/transactions/dispatchandhauling/hauling">{{$ongoing->strJODesc}}</a></h3>
                                            <small style="font-size:20px;" class="float-left mt-2 font-weight-bold"> {{$ongoing->strCompanyName}} </small>
                                            <h3 class="float-right mt-1" style="font-size: 15px;">
                                                <span class="">STATUS : </span>
                                                <button type="button" tab-index="-1" class="text-white btn btn-success btn-sm disabled" style="font-size: 12px; border-radius: 3px; font-weight:bold; pointer-events: none;" aria-disabled="true">ONGOING</button>
                                            </h3>
                                        </div>
                                        <div class="card-footer mt-2">
                                            <small style="font-size:15px;" class="float-left mt-2 text-black"> {{$ongoing->dateStarted}} &nbsp;</small>
                                            <small style="font-size:15px;" class="float-left mt-2 text-black ml-1"> {{$ongoing->tmStarted}} </small>
                                            <small style="font-size:15px;" class="float-right mt-2"> {{$ongoing->enumServiceType}} </small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="float-right">
                            <a data-collapse="#timelineCard" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                        </div>
                        <h4>Timeline</h4>
                    </div>
                    <div class="collapse show" id="timelineCard">
                        <div class="card-body">
                            <div id="resume" class="section-padding">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div>
                                                <ul class="timeline">
                                                    <li>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <h2 class="timelin-title">September 8 ,2018</h2>
                                                    </li>
                                                    <li>
                                                        <div class="content-text">
                                                        <h3 class="line-title">1230 HRS</h3>
                                                            <span>
                                                                <a href="/administrator/transactions/hauling">Job Order # 17</a>
                                                            </span>
                                                            <p class="line-text float-right">25 hours ago</p>
                                                            <p class="line-text"><i class="fas fa-map-pin text-primary mr-2"></i>Currently at North</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <ul class="timeline">
                                                    <li>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <h2 class="timelin-title">September 9 ,2018</h2>
                                                    </li>
                                                    <li>
                                                        <div class="content-text">
                                                            <h3 class="line-title">0130 HRS</h3>
                                                            <span>
                                                                <a href="/administrator/transactions/hauling">Job Order # 17</a>
                                                            </span>
                                                            <p class="line-text float-right">25 minutes ago</p>
                                                            <p class="line-text"><i class="fas fa-map-pin text-primary mr-2"></i>Currently at Pasig</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center text-white">Sales Report</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="158"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center text-white">Activity Log</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="/others/stisla_admin_v1.0.0/dist/img/tbLogo.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Administrator</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="/others/stisla_admin_v1.0.0/dist/img/tbLogo.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Administrator</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="/others/stisla_admin_v1.0.0/dist/img/tbLogo.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Administrator</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="/others/stisla_admin_v1.0.0/dist/img/tbLogo.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Administrator</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-round">
                            View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
