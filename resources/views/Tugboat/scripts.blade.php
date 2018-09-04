    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/jquery.smartWizard.min.js"></script>
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/modules/moment/moment.js"></script>
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/custom.js"></script>
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/edit.js"></script>
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/add.js"></script> --}}
    @if(Auth::user()->enumUserType == 'Admin')
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/tugboat/tugboat.js"></script>
    @elseif(Auth::user()->enumUserType == 'Affiliates')
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/tugboat/tugboatAffiliates.js"></script>
    @endif
    <!--July 27, 2018-->
    {{-- <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/modules/nice-select/jquery.nice-select.min.js"></script> --}}
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/tugboat/extra.js"></script>
    
    <!--July 28, 2018-->
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/validations/tugboatValidation.js"></script>
    <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/withCard.js"></script>
    