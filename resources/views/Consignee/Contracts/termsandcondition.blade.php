{{-- New View for Pier Create (Modal) --}}
<div class="modal fade" id="showTermsCondition" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Initial Terms and Condition</h1>
            </div>
            <div class="modal-body modalBody">
                @if(count($TermsCondition)>0)
                <textarea class="summernoteQuote" name="" id="" cols="30" rows="10">
                {{-- @foreach($TermsCondition) --}}
                    {{$TermsCondition[0]->strContractListDesc}}
                {{-- @endforeach --}}
                </textarea>
                @endif
                
            </div>
        </div>
    </div>
</div>
