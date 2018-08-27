@extends('Templates.newTemplate')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Team Composition 
              <small class="smCat">Utilities</small>
            </div>
        </h1>
        <div class="zoomIn animated fast">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Positions</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 animated bounceIn fast">
                            <div class="card card-sm-3 border-primary card-primary">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-anchor"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>CAPTAIN</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <input type="number" class="form-control mt-2" style="width:130px;" placeholder="1" value="{{$teamcomp[0]->intTCCaptainNumber}}">
                                                </li>
                                            </ul>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 animated bounceIn fast">
                            <div class="card card-sm-3 border-primary card-primary">
                                <div class="card-icon bg-primary">
                                    CE
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>CHIEF ENGINEER</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="number" class="form-control mt-2" style="width:130px;" placeholder="1" value="{{$teamcomp[0]->intTCChiefEngineerNumber}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 animated bounceIn fast">
                            <div class="card card-sm-3 border-primary card-primary">
                                <div class="card-icon bg-primary">
                                    C
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>CREW</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="number" class="form-control mt-2" style="width:130px;" placeholder="1" value="{{$teamcomp[0]->intTCCrewNumber}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 animated bounceIn fast">
                            <div class="card card-sm-3 border-primary">
                                <div class="card-icon bg-primary">
                                    O
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>OTHERS</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="number" class="form-control mt-2" style="width:130px;" placeholder="1" {{$teamcomp[0]->intTCOthersNumber}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary waves-effect float-right">Save Changes</button>
                </div>
            </div>
        </div>
    </section>
@endsection