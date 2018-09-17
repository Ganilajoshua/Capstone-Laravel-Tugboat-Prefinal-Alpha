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
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <div class="card card-sm-3" style="margin-bottom:0px;">
                            <div class="card-icon bg-primary">
                                <i class="ion ion-android-boat"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                <a data-collapse="#ongoingJOCard" class="btn btn-icon text-black float-right"><i class="ion ion-minus"></i></a>
                                    <h4>Ongoing Job Orders</h4>
                                </div>
                                <div class="card-body mt-1" style="font-size:25px;">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse show" id="ongoingJOCard">
                        <div class="card-body">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card card-sm-2 card-primary border-primary activeCards">
                                    <div class="card-icon">
                                        <i class="ion ion-android-boat text-primary"></i>
                                    </div>
                                    <div class="card-header">
                                        <h4 class="text-primary mb-2">Job Order</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5>Consignee</h5>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text">Location Update: safasfasfasf</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-sm-4">
                    <div class="card-icon bg-danger">
                        <i class="ion ion-ios-paper-outline"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>News</h4>
                        </div>
                        <div class="card-body">
                            1
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-warning">
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Reports</h4>
                        </div>
                        <div class="card-body">
                            1,201
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
                    <div class="card-header">
                        <div class="float-right">
                            <div class="btn-group">
                                <a href="#" class="btn active">Week</a>
                                <a href="#" class="btn">Month</a>
                                <a href="#" class="btn">Year</a>
                            </div>
                        </div>
                        <h4>Statistics</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="158"></canvas>
                        <div class="statistic-details mt-sm-4">
                            <div class="statistic-details-item">
                                <small class="text-muted"><span class="text-primary"><i class="ion-arrow-up-b"></i></span> 7%</small>
                                <div class="detail-value">$243</div>
                                <div class="detail-name">Today's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <small class="text-muted"><span class="text-danger"><i class="ion-arrow-down-b"></i></span> 23%</small>
                                <div class="detail-value">$2,902</div>
                                <div class="detail-name">This Week's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <small class="text-muted"><span class="text-primary"><i class="ion-arrow-up-b"></i></span>9%</small>
                                <div class="detail-value">$12,821</div>
                                <div class="detail-name">This Month's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <small class="text-muted"><span class="text-primary"><i class="ion-arrow-up-b"></i></span> 19%</small>
                                <div class="detail-value">$92,142</div>
                                <div class="detail-name">This Year's Sales</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Activity Log</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-1.jpeg" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Farhan A Mujib</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-2.jpeg" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Ujang Maman</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-3.jpeg" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Rizal Fakhri</div>
                                    <small>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../dist/img/avatar/avatar-4.jpeg" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10m</small></div>
                                    <div class="media-title">Alfa Zulkarnain</div>
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
