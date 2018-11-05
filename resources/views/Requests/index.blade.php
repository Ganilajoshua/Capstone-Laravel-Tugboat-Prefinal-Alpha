@extends('Templates.newTemplate')

@section('assets')
    @include('Requests.styles')
@endsection

@section('scripted')
    @include('Requests.scripts')
@endsection
@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Requests
                <small class="ml-1 smCat">
                    Dispatch &amp; Hauling
                </small>
            </div>
        </h1>
        
            
        <div class="section-header text-center">
            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border border-primary mr-1" id="pillsFJobOrder-tab" data-toggle="pill" href="#pillsFJobOrder" role="tab" aria-controls="pillsFJobOrder" aria-selected="true">Job Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border border-primary mr-1" id="pillsBTeam-tab" data-toggle="pill" href="#pillsBTeam" role="tab" aria-controls="pillsBTeam" aria-selected="false">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border border-primary mr-1" id="pillsRescheduling-tab" data-toggle="pill" href="#pillsRescheduling" role="tab" aria-controls="pillsRescheduling" aria-selected="false">Reschedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border border-primary" id="pillsBTugboat-tab" data-toggle="pill" href="#pillsBTugboat" role="tab" aria-controls="pillsBTugboat" aria-selected="false">Tugboat</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pillsFJobOrder" role="tabpanel" aria-labelledby="pillsFJobOrder-tab">
                        FJob
                        @include('Requests.joborder')
                    </div>
                    <div class="tab-pane fade" id="pillsBTeam" role="tabpanel" aria-labelledby="pillsBTeam-tab">
                        FTeam
                        @include('Requests.team')
                    </div>
                    <div class="tab-pane fade" id="pillsBTugboat" role="tabpanel" aria-labelledby="pillsBTugboat-tab">
                        FTugboat
                        @include('Requests.tugboat')
                    </div>
                    <div class="tab-pane fade" id="pillsRescheduling" role="tabpanel" aria-labelledby="pillsRescheduling-tab">
                        @include('Requests.reschedules')
                    </div>
                </div>
            </div>
        </div>

            
            
        </section>
    </section>
@endsection