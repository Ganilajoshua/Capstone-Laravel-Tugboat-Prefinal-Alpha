<div class="tab-pane show active" id="firstTab" role="tabpanel" aria-labelledby="navFirstTab">
    @include('Consignee.Joborders.createhauling')
    @include('Consignee.Joborders.createtugassist')
    {{-- @include('Consignee.Joborders.createsalvage') --}}
    <div class="chooseServiceTab">
        <div class="card-deck animated zoomIn faster">
            <div class="card text-center">
                <img class="card-img-top" src="/others/stisla_admin_v1.0.0/dist/img/tugboatHauling.png" alt="Hauling">
                <div class="card-body">
                    <h5 class="card-title">Hauling Service</h5>
                    <p class="card-text">Hauling of either a Cargo, Vessel, or Barge from a starting point to destination.</p>
                </div>
                <div class="card-footer">
                    <a href="#" id="showHaulingTab">Choose this Service</a> 
                </div>
            </div>
            <div class="card text-center">
                <img class="card-img-top" src="/others/stisla_admin_v1.0.0/dist/img/tugAssist.png" alt="Tug Assist">
                <div class="card-body">
                    <h5 class="card-title">Tug Assist</h5>
                    <p class="card-text">Tug Assist Service in Berthing and Unberthing of Marine Vessels</p>
                </div>
                <div class="card-footer">
                    <a href="#" id="showTugAssistTab">Choose this Service</a> 
                </div>
            </div>
            {{-- <div class="card text-center">
                <img class="card-img-top" src="/others/stisla_admin_v1.0.0/dist/img/salvage.png" alt="Salvage">
                <div class="card-body">
                    <h5 class="card-title">Salvage Service</h5>
                    <p class="card-text">
                        A rescue service that rescue ships which are in distress or in danger of sinking, or to salvage ships which have already sunk or run aground.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="#" id="showSalvageTab">Choose this Service</a> 
                </div>
            </div> --}}
        </div>
    </div>
</div>