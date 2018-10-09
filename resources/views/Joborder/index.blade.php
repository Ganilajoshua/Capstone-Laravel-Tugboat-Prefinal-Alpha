@extends('Templates.newTemplate')

@section('assets')
    @include('Joborder.styles')
@endsection
@section('scripted')
    @include('Joborder.scripts')
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
        @include('Joborder.list')
    </section>
@endsection

@section('outside')
    @include('Joborder.info')
    @include('Joborder.forward')
    {{-- @include('Joborder.declined') --}}
@endsection