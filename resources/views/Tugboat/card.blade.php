<div class="cardLayout">
    <div class="row mt-3">
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="#" id="addCard" class="card text-center border-dark bounceIn animated" data-toggle="tooltip" title="Add">
                <div class="card-body">
                    <i id="addCardIcon" class="ion-plus-circled"></i>
                </div>
            </a>
        </div>
        <input type="hidden" id="classID" value={{$maxClassID}}>
        <input type="hidden" id="mainID" value={{$maxMainID}}>
        <input type="hidden" id="specsID" value={{$maxSpecsID}}>
        <input type="hidden" id="tugboatsID" value="{{$maxTugboatID}}">
        
        @if(count($tugboats)>0)
            @foreach($tugboats as $tugboats)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div id="cardwInfo" class="card text-center border-dark bounceIn animated" style="width: 15rem;">
                        <img class="card-img-top" src="/others/stisla_admin_v1.0.0/dist/img/example-image.jpeg" alt="Image cannot be found">
                        <div class="card-body">
                        <h5 class="card-title" id="ctitle">{{$tugboats->strName}} </h5>
                            <span data-target="#infoModal">
                                <button type="button" onclick="getData({{$tugboats->intTugboatMainID}})"class="btn btn-primary nCustom" data-toggle="tooltip" title="View Information">
                                <i class="fas fa-info custSize"></i>
                                
                                </button>
                            </span>
                            <br>
                            <div class="mr-1">
                                <button onclick="editData({{$tugboats->intTugboatMainID}})" class="btn btn-secondary optCustom" data-toggle="tooltip" title="Edit" role="button">
                                    <i class="fas fa-edit iconcenter custSize"></i>
                                </button>
                                <button onclick="deleteTugboat({{$tugboats->intTugboatMainID}})" type="button" class="btn btn-danger optCustom" data-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash custSize"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>  
            @endforeach
        @endif
    </div>
</div>
