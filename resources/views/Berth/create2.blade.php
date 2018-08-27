<div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add</h5>
          <button type="button" class="close modalClose" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modalBody">
          <form>
            <div class="form-group">
              <label for="addPosition">Position<sup class="text-primary">&#10033;</sup></label>
              <input type="text" class="form-control" id="addPosition" name="addPosition" placeholder="Position">
            </div>
            <div class="form-group">
                <label for="pierSelect">Pier<sup class="text-primary">&#10033;</sup></label>
                <select id="pierSelect" name="pierSelect" class="form-control form-control-lg">
                    <option>Select Pier</option>
                    <option>Select Pier</option>
                    <option>Select Pier</option>
                    <option>Select Pier</option>
                    {{-- @foreach($piers as $piers)
                        <option value="{{$piers->intPierID}}">{{$piers->strPierName}}</option>
                    @endforeach                     --}}
                </select>
            </div>
            <button type="button" class="btnAdd btn btn-primary waves-effect float-right">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>