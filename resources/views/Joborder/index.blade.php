@extends('Templates.newTemplate')

@section('assets')
    @include('Joborder.scripts')
    @include('Joborder.styles')
@endsection
@section('scripted')
@endsection
@section('content')
    <section id="mainSection" class="section">
        <h1 class="section-header">
            <div>
            Dispatch &amp; Hauling
            <small class="ml-1 smCat">
            Job Order
            </small>
            </div>
        </h1>
        @include('Joborder.list')
        {{-- @include('Joborder.create') --}}
    </section>
@endsection

@section('outside')
    {{-- @include('Joborder.info') --}}
    @include('Joborder.forward')
    {{-- @include('Joborder.declined') --}}
@endsection