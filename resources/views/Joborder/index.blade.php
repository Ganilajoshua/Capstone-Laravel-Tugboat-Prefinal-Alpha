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
        @if(Auth::user()->enumUserType == 'Admin')
            @include('Joborder.list')
        @elseif(Auth::user()->enumUserType == 'Affiliates')
            @include('Joborder.forwardlist')
        @endif
            {{-- @include('Joborder.create') --}}
    </section>
@endsection

@section('outside')
    @include('Joborder.info')
    @include('Joborder.forward')
    {{-- @include('Joborder.declined') --}}
@endsection