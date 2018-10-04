@extends('Templates.newTemplate')

@section('assets')
   @include('Hauling.styles')
@endsection

@section('scripted')
   @include('Hauling.scripts')
@endsection
@section('content')
    <section id="mainSection" class="section">
        <h1 class="section-header">
            <div>
            Hauling
            <small class="ml-1 smCat">
            Dispatch &amp; Hauling
            </small>
            </div>
        </h1>
        <!--Job Schedule List-->
        @if(Auth::user()->enumUserType == 'Admin')
            @include('Hauling.list')
            @include('Hauling.startHauling')
        @elseif(Auth::user()->enumUserType == 'Affiliates')
            @include('Hauling.forwardlist')
        @endif
    </section>
    <!--Location Updates Modal-->
    @include('Hauling.location')
    <!--More Info Modal-->
    @include('Hauling.info')
    @include('Hauling.jobschedinfo')
@endsection

@section('outside')
    
@endsection