<div class="modal fade" id="billInfoModal" tabindex="-1" role="dialog" aria-labelledby="billInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="billInfoModalLabel"><small>Bill # <span id="intBillID"></span></small>
                    <h4>Job Order Name</h4></div>
                <button type="button" class="mb-1 close modalClose waves-effect" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    {{-- @foreach(count($Counter)>0) --}}
                    <table class="table table-striped border-primary text-center">
                        <thead class="bg-primary text-white">
                            <th>Particulars</th>
                            <th>Add ( &#8369; )</th>
                            <th>Less ( &#8369; )</th>
                        </thead>
                        <tbody>

                        <tr>
                            <td class="tdBorderLeft">Job Order Amount</td>
                            <td class="tdBorderLeft" id="amount"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdBorderLeft">Tugboat Delay Fee</td>
                            <td class="tdBorderLeft"></td>
                            <td id="delayfee"></td>
                        </tr>
                        <tr>
                            <td class="tdBorderLeft">Violation Fee</td>
                            <td class="tdBorderLeft" id="conviolationfee"></td>
                            <td id="comviolationfee"></td>
                        </tr>
                        <tr>
                            <td class="tdBorderLeft">Late Fee</td>
                            <td class="tdBorderLeft" id="conlatefee"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdBorderLeft">Damage Fee</td>
                            <td class="tdBorderLeft" id="condamagefee"></td>
                            <td id="comdamagefee"></td>
                        </tr>
                        <tr>
                                <td class="tdBorderLeft">Discounts</td>
                                <td class="tdBorderLeft" ><span id="discount"></span>%</td>
                                <td></td>
                            </tr>
                            <tr style="background:white;">
                                    <td class="tdBorderLeft"><h4>TOTAL ( &#8369; )</h4></td>
                                    <td colspan="2" id="total"></td>
                                </tr>
                            </tbody>
                        </table>
                {{-- @endforeach --}}
                    </div>
                </div>
        </div>
    </div>
</div>