
<div class="viewCharges">
        <div class="card card-primary animated slideInDown fast">
            <div class="card-header">
                    <a href="#" class="btnFinalizeBack btn btn-lg btn-link float-left" data-toggle="tooltip" title="Back" role="button">
                        <i class="ion-chevron-left"></i>
                    </a>
                    <h4 class="float-right">Additional Charges for Bill #</h4>
                </div>
        <form>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="amount">Job Order Amount</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input class="form-control" name="amount" id="amount">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <div class="input-group">
                                <input type="number" name="discount" id="discount" class="form-control" min="0" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="delay">Tugboat Delay Fee</label>
                            {{-- <input type="number" name="delay" id="delay" class="form-control" required> --}}
                            <div class="input-group">
                                <input type="number" class="form-control" id="delay" name="delay" placeholder="No. of Hour">
                                <div class="input-group-append">
                                    <span class="input-group-text">x</span>
                                </div>
                                <input type="number" class="form-control" id="" name="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="companydamagefee">Company Damage Fee</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input type="number" name="companydamagefee" id="companydamagefee" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="companyviolation">Company Violation Fee</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input type="number" name="companyviolation" id="companyviolation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="consigneelatefee">Consignee Late Fee</label>
                            {{-- <input type="number" name="consigneelatefee" id="consigneelatefee" class="form-control" required> --}}
                            <div class="input-group">
                                <input type="number" class="form-control" id="consigneelatefee" name="consigneelatefee" placeholder="No. of Hour">
                                <div class="input-group-append">
                                    <span class="input-group-text">x</span>
                                </div>
                                <input type="number" class="form-control" id="" name="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="consigneedamagefee">Consignee Damage Fee</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input type="number" name="consigneedamagefee" id="consigneedamagefee" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="consigneeviolation">Consignee Violation Fee</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">&#8369; </span>
                                </div>
                                <input type="number" name="consigneeviolation" id="consigneeviolation" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <button type="submit" onclick="finalize()" class=" btn btn-primary waves-effect float-right">Apply Charges</button>
            </div>
        </form>
        </div>
    </div>