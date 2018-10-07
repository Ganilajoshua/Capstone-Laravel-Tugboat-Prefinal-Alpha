<script src="/others/stisla_admin_v1.0.0/dist/modules/moment/moment.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/modules/tempus-dominus/js/tempusdominus-date.min.js"></script>
@if(Auth::user()->enumUserType == 'Admin')
    <script src="/others/stisla_admin_v1.0.0/dist/js/joborders/joborder.js"></script>
@elseif(Auth::user()->enumUserType == 'Affiliates')
    <script src="/others/stisla_admin_v1.0.0/dist/js/joborders/joborderAffiliates.js"></script>
@endif
<script src="/others/stisla_admin_v1.0.0/dist/js/joborders/dhJobOrder.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/js/teamassignment/validation.js"></script>
<script src="/others/stisla_admin_v1.0.0/dist/modules/nice-select/jquery.nice-select.min.js"></script>