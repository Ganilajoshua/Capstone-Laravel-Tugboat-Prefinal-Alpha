        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/jquery.smartWizard.min.js"></script>
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/custom.js"></script>
        @if(Auth::user()->enumUserType == 'Admin')
                <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/employee/employee.js"></script>
        @elseif(Auth::user()->enumUserType == 'Affiliates')
                <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/employee/employeeAffiliates.js"></script>
        @endif
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/maintenance.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/nice-select/jquery.nice-select.min.js"></script>
