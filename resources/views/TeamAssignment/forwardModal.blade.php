<div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="forwardModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" style="max-width: 68%;"role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardModalLabel">Forward Team</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center">
                            <div class="card-header">
                                <div class="float-right">
                                    <a data-collapse="#viewForwardEmployees" class="btn btn-icon"><i class="ion ion-minus"></i></a>
                                </div>
                                <h5 class="text-center ml-5 teamname">List of Employees</h5>
                            </div>
                            <div class="collapse show" id="viewForwardEmployees">
                                <div class="card-body">
                                    <div class="viewTeamInfo row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="selectForwardCompany">Select Company To Forward To<sup class="text-primary">&#10033;</sup></label>
                        <select id="selectForwardCompany" name="selectForwardCompany" class="form-control form-control-lg">
                            <option>Select Company</option>
                            @foreach($affiliates as $affiliates)
                                <option value="{{$affiliates->intCompanyID}}">{{$affiliates->strCompanyName}}</option>
                            @endforeach                    
                        </select>
                    </div>
                </div>
                {{-- <div class="col-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label for="exDetails">Extra Details</label>
                        <textarea class="form-control" id="exDetails" rows="5" placeholder="Message"></textarea>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect forwardTeamButton">Forward Team</button>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-sm-12 col-lg-12">
    
</div>