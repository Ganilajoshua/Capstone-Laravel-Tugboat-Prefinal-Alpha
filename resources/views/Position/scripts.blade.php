        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/jquery.smartWizard.min.js"></script>
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/custom.js"></script>
        @if(Auth::user()->enumUserType == 'Admin')
            <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/position/position.js"></script>
        @elseif(Auth::user()->enumUserType == 'Affiliates')
            <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/position/positionAffiliates.js"></script>
        @endif
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/maintenance.js"></script>
        
    