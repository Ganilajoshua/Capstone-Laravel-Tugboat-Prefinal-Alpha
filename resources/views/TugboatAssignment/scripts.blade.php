<script src="/others/stisla_admin_v1.0.0/dist/js/tugboatassignment/appendFunctions.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/js/tugboatassignment/tugboatAssignment.js"></script>

@if(Auth::user()->enumUserType == 'Admin')
    <script src="/others/stisla_admin_v1.0.0/dist/js/tugboatassignment/tugboatassign.js"></script>
@elseif(Auth::user()->enumUserType == 'Affiliates')
    <script src="/others/stisla_admin_v1.0.0/dist/js/tugboatassignment/tugboatassignAffiliates.js"></script>
@endif
{{-- <script src="/others/stisla_admin_v1.0.0/dist/js/algorithm/tugboatcombinations.js"></script> --}}
<script src="/others/stisla_admin_v1.0.0/dist/js/algorithm/tugboatscombination.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/js/algorithm/tugboatschedules.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/js/algorithm/tugboatscombination.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/js/algorithm/tugboatscombination.js"></script>
{{-- <script src="/others/stisla_admin_v1.0.0/dist/js/teamassignment/teamassignment.js"></script> --}}