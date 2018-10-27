@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
@endsection

{{-- Local Scripts --}}
@section('scripted')
    @include('TermsAndCondition.scripts')
@endsection
   
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
        Terms and Condition
        <small class="ml-1 smCat">
            Utilities
        </small>
        </div>
    </h1>
    <div class="form-group">
        {{-- <label>Terms and Condition</label> --}}
    <textarea class="summernoteContract" id="terms">{{$TermsCondition->strTermsConditionDesc}}</textarea>

    <button class="btn btn-primary" onclick="alert({{$TermsCondition->intTermsConditionID}})">Save Changes</button>
    </div>
</section>
{{-- @include('Pier.create') --}}
@endsection
