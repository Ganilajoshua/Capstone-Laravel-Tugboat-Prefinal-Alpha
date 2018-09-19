<!DOCTYPE html>
<html lang="en">
<head>
    <title>TSMS &mdash; Consignee</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('Consignee.Templates.ConsigneeStyles')
    @yield('styles')
    <link rel="shortcut icon" href="/others/stisla_admin_v1.0.0/dist/img/tbLogo.png">
    
    
</head>
<body class="animsition">
    <div class="page-wrapper">
        @include('Consignee.Templates.headerD')

        @include('Consignee.Templates.headerM')

        <div class="page-content--bgf7">

            @include('Consignee.Templates.breadcrumb')
            
            @yield('content')

        </div>
    </div>
    @include('Consignee.Templates.ConsigneeScripts')
    
    @yield('scripts')
    
</body>
</html>