@extends('Templates.newTemplate')

@section('assets')
    @include('Schedule.styles')
    @include('Schedule.scripts')
@endsection

@section('content')
    <section class="section">
        <h1 class="section-header">
                <div>
                Dispatch &amp; Hauling
                <small class="smCat">Scheduling</small>
                </div>
            </h1>
        <!-- Create Schedule -->
        <div class="createSched animated fadeIn">
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary ">
                            <div class="card-header with-border">
                                <h4 class="card-title text-center">Draggable Events</h4>
                            </div>
                            <div class="card-body">
                                <!-- the events -->
                                <div id="external-events">
                                    <input type="hidden" value="{{$schedules}}" id="sched">
                                    @if(count($schedules)>0)
                                        @foreach($schedules as $schedules)
                                            <div class="external-event bg-green">{{$schedules->strScheduleDesc}}</div>
                                        @endforeach
                                    @endif
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="drop-remove">
                                        <label class="custom-control-label" for="drop-remove">Remove After Drop</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header with-border">
                                <h4 class="card-title text-center">Create Event</h4>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /btn-group -->
                                <div class="input-group mb-3">
                                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary waves-effect">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary border-primary">
                            <div class="card-body no-padding">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>
@endsection
