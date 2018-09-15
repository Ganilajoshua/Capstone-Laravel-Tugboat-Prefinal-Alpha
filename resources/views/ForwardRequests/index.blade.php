@extends('Templates.newTemplate')

@section('assets')
    @include('ForwardRequests.styles')
@endsection

@section('scripted')
    @include('ForwardRequests.scripts')
@endsection
@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
                Forward Requests
                <small class="ml-1 smCat">
                    Dispatch &amp; Hauling
                </small>
            </div>
        </h1>
        <section class="sectionDark">
            <div class="container">
                <div class="section-header text-center" style="text-transform: uppercase;">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pillsFJobOrder-tab" data-toggle="pill" href="#pillsFJobOrder" role="tab" aria-controls="pillsFJobOrder" aria-selected="true">Job Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pillsBTeam-tab" data-toggle="pill" href="#pillsBTeam" role="tab" aria-controls="pillsBTeam" aria-selected="false">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pillsBTugboat-tab" data-toggle="pill" href="#pillsBTugboat" role="tab" aria-controls="pillsBTugboat" aria-selected="false">Tugboat</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pillsFJobOrder" role="tabpanel" aria-labelledby="pillsFJobOrder-tab">
                            @include('ForwardRequests.fjoborder')
                        </div>
                        <div class="tab-pane fade" id="pillsBTeam" role="tabpanel" aria-labelledby="pillsBTeam-tab">
                            @include('ForwardRequests.bteam')
                        </div>
                        <div class="tab-pane fade" id="pillsBTugboat" role="tabpanel" aria-labelledby="pillsBTugboat-tab">
                            @include('ForwardRequests.btugboat')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection