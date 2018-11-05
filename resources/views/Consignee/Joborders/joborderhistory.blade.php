<div class="tab-pane animated slideInRight faster" id="sixthTab" role="tabpanel" aria-labelledby="navSixthTab">
    <div class="row mt-2">
        <div class="col">
            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pillsFinished-tab" data-toggle="pill" href="#pillsFinished" role="tab" aria-controls="pillsFinished" aria-selected="true">Finished</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pillsDeclined-tab" data-toggle="pill" href="#pillsDeclined" role="tab" aria-controls="pillsDeclined" aria-selected="false">Declined</a>
                </li>
            </ul>
        </div>    
    </div>
    <div class="tab-content mt-2" id="pills-tabContent">
        <div class="tab-pane fade show active mt-5" id="pillsFinished" role="tabpanel" aria-labelledby="pillsFinished-tab">
            <div class="table-responsive">
                @if(count($jobhistoryfinished)>0)
                    <table class="detailedTable text-center table table-striped" style="width:100%">
                        <thead class="bg-primary">
                            <tr class="text-white">
                                <th>#</th>
                                <th>Title</th>
                                <th>Transaction Date</th>
                                <th>Time Ended</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobhistoryfinished as $jobhistoryfinished)
                                <tr>
                                    <td>{{$jobhistoryfinished->intJobOrderID}}</td>
                                    <td>{{$jobhistoryfinished->strJOTitle}}</td>
                                    <td>{{$jobhistoryfinished->datEndDate}}</td>
                                    <td>{{$jobhistoryfinished->tmEnded}}</td>
                                    <td>
                                        <div class="ml-1 mr-1">
                                            <button class="btnView btn btn-primary btn-sm waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                                <i class="bigIcon fa fa-eye"></i>
                                            </button>
                                            {{-- <button class="btn btn-success btn-sm waves-circle waves-effect" data-toggle="tooltip" title="print" role="button">
                                                <i class="bigIcon fa fa-print"></i>
                                            </button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(count($jobhistoryfinished) == 0)
                    <table class="detailedTable text-center table table-striped" style="width:100%">
                        <thead class="bg-primary">
                            <tr class="text-white">
                                <th>#</th>
                                <th>Transaction Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th class="noSortAction">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <div class="tab-pane fade mt-5" id="pillsDeclined" role="tabpanel" aria-labelledby="pillsDeclined-tab">
            @if(count($jobhistorydeclined)>0)
                <table class="detailedTable text-center table table-striped" style="width:100%">
                    <thead class="bg-primary">
                        <tr class="text-white">
                            <th>#</th>
                            <th>Title</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobhistorydeclined as $jobhistorydeclined)
                            <tr>
                                <td>{{$jobhistorydeclined->intJobOrderID}}</td>
                                <td>{{$jobhistorydeclined->strJOTitle}}</td>
                                <td>{{$jobhistorydeclined->strRemarks}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif(count($jobhistorydeclined) == 0)
                <table class="detailedTable text-center table table-striped" style="width:100%">
                    <thead class="bg-primary">
                        <tr class="text-white">
                            <th>#</th>
                            <th>Transaction Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>