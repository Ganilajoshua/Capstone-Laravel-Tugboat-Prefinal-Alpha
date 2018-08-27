{{-- New View for Berth Edit (Modal) --}}
<div class="modal fade" id="editBerthModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Edit Berth</h5>
                <button id="closeEdit" type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="editBerth">Berth Name<sup class="text-primary">&#10033;</sup></label>
                                <input type="text" class="form-control" id="editBerth" name="editBerth" placeholder="Berth Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="editPierSelect">Pier<sup class="text-primary">&#10033;</sup></label>
                                <select id="editPierSelect" name="editPierSelect" class="form-control form-control-lg">
                                    <option>Select Pier</option>
                                    @foreach($piers as $piers)
                                        <option value="{{$piers->intPierID}}">{{$piers->strPierName}}</option>
                                    @endforeach                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="editIDhide">
                    <button type="button" onclick="editBerthSubmit()" class="btnAdd btn btn-primary waves-effect float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit View -->
{{-- <div id="editLayout" class="editLayout">
    <div class="card animated bounceInLeft">
        <div class="card-header">
            <spanstyle="height:50px;">
                <button id="backButtonEdit" class="btn btn-lg btn-link float-left mt-1" data-toggle="tooltip" title="Back" role="button">
                    <i class="ion-chevron-left custSize"></i>
                </button>
                <button class="btn btn-lg btn-link float-right"></button>
                <h3 class="text-center">EDIT</h3>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="editBerth">Berth<sup class="text-primary">&#10033;</sup></label>
                        <input type="text" class="form-control" id="editBerth" name="editBerth" placeholder="Berth">
                        <p id="editID"></p>
                        <input type="hidden" id="editIDhide">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="editPierSelect">Pier<sup class="text-primary">&#10033;</sup></label>
                        <select id="editPierSelect" name="editPierSelect" class="form-control form-control-lg">
                            <option>Select Pier</option>
                            @foreach($piers as $piers)
                                <option value="{{$piers->intPierID}}">{{$piers->strPierName}}</option>
                            @endforeach                    
                        </select>
                    </div>
                </div>
            </div>
            <button onclick="editBerthSubmit()" class="btn btn-primary float-right font-weight-bold">Submit</button>
            <br>
        </div>
    </div>
</div> --}}