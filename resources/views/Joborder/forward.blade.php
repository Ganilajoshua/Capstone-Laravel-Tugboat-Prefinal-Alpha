<div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="forwardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 68%;"role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardModalLabel">Forward Job Order</h5>
                <button type="button" class="close modalClose" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalBody">
                <div class="card card-sm-2 card-primary border-primary">
                    <div class="card-icon">
                        <i class="ion ion-android-boat text-primary"></i>
                    </div>
                    <div class="card-header">
                        <h4 class="text-primary mb-2">Job Order # 4</h4>
                    </div>
                    <div class="card-body">
                        <h5>Consignee Name</h5>
                    </div>
                    <div class="card-footer mt-2">
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Date of Transaction : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>May 4, 2018</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Estimated Time of Hauling : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>0730 HRS</h6></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Starting Location : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>PUP</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Destination : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>Pureza</h6></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item text-primary">
                                        <h6>Goods to be delivered : </h6></li>
                                    <li class="list-inline-item">
                                        <h6>Very Good</h6></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label>Forward Type<sup class="text-primary">&#10033;</sup></label>
                        <div>
                            <select class="wide">
                                <option value="forwardJO">Forward Job Order</option>
                                <option value="borrowTeam">Borrow Team</option>
                                <option value="borrowTugboat">Borrow Tugboat</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="exDetails">Extra Details</label>
                        <textarea class="form-control" id="exDetails" rows="5" placeholder="Message"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="forwardJobOrder()" type="button" class="btn btn-primary waves-effect">Submit Forward Request</button>
            </div>
        </div>
    </div>
</div>