@extends('Templates.newTemplate')

@section('assets')
    @include('Affiliates.JobOrders.styles')
@endsection
@section('scripted')
    @include('Affiliates.JobOrders.scripts')
@endsection
@section('content')
    <section id="mainSection" class="section">
        <h1 class="section-header">
            <div>
            Job Orders
            <small class="ml-1 smCat">
                Dispatch &amp; Hauling
            </small>
            </div>
        </h1>
        @include('Affiliates.JobOrders.list')
    </section>
@endsection

@section('outside')
    @include('Affiliates.JobOrders.info')
    {{-- @include('Joborder.forward') --}}
    {{-- @include('Joborder.declined') --}}
@endsection