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
                <input type="hidden" id="teamComposition" value="{{$teamcomp}}">
                <div class="card-body">
                    <div class="row">
                        @if(count($teamcomp)>0)
                            @foreach($teamcomp as $teamcomp)
                                @if($teamcomp->strPositionName == 'Captain' || $teamcomp->strPositionName == 'captain')
                                    <div class="col-lg-3 col-md-6 col-12 animated bounceIn fast">
                                        <div class="card card-sm-3 border-primary card-primary">
                                            <div class="card-icon bg-primary">
                                                <i class="fas fa-anchor"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>{{$teamcomp->strPositionName}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <input type="number" class="form-control mt-2 teamComposition" name="teamcomp[]" data-id="{{$teamcomp->intPositionID}}" data-position="{{$teamcomp->strPositionName}}" style="width:130px;" placeholder="1" value="{{$teamcomp->intPositionCompNum}}">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($teamcomp->strPositionName == 'Chief Engineer' || $teamcomp->strPositionName == 'chief engineer')
                                    <div class="col-lg-3 col-md-6 col-12 animated bounceIn fast">
                                        <div class="card card-sm-3 border-primary card-primary">
                                            <div class="card-icon bg-primary">
                                                CE
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>{{$teamcomp->strPositionName}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <input type="number" class="form-control mt-2 teamComposition" name="teamcomp[]" data-id="{{$teamcomp->intPositionID}}" data-position="{{$teamcomp->strPositionName}}" style="width:130px;" placeholder="1" value="{{$teamcomp->intPositionCompNum}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($teamcomp->strPositionName == 'Crew' || $teamcomp->strPositionName == 'crew')
                                    <div class="col-lg-3 col-md-6 col-12 animated bounceIn fast">
                                        <div class="card card-sm-3 border-primary card-primary">
                                            <div class="card-icon bg-primary">
                                                C
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>{{$teamcomp->strPositionName}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <input type="number" class="form-control mt-2 teamComposition" name="teamcomp[]" data-id="{{$teamcomp->intPositionID}}" data-position="{{$teamcomp->strPositionName}}" style="width:130px;" placeholder="1" value="{{$teamcomp->intPositionCompNum}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-3 col-md-6 col-12 animated bounceIn fast">
                                        <div class="card card-sm-3 border-primary card-primary">
                                            <div class="card-icon bg-primary">
                                                <span class="position{{$teamcomp->intPositionID}}">

                                                </span>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>{{$teamcomp->strPositionName}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <input type="number" class="form-control mt-2 teamComposition" name="teamcomp[]" data-id="{{$teamcomp->intPositionID}}" data-position="{{$teamcomp->strPositionName}}" style="width:130px;" placeholder="1" value="{{$teamcomp->intPositionCompNum}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary waves-effect float-right saveChanges">Save Changes</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripted')
    @include('Utilities.TeamComposition.scripts')
@endsection