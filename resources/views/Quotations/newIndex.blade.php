@extends('Templates.newTemplate')

@section('assets')
    @include('Quotations.scripts')
    {{-- @include('Quotation.styles') --}}
@endsection
@section('scripted')
    @include('Quotations.scripts')
@endsection
@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>
            Quotations
            </div>
        </h1>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <section class="sectionDark">
                        <div class="container">
                            <h5 class="section-header text-center" style="text-transform: uppercase;">
                          Create
                        </h5>
                        </div>
                        <div class="row ml-1 mr-1">
                            <div class="col">
                                <form class="needs-validation" novalidate="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="addQuoteTitle">Title<sup class="text-primary">&#10033;</sup></label>
                                                <input type="text" name="addQuoteTitle" id="addQuoteTitle" class="form-control" placeholder="Quotation Title" required>
                                                <div class="invalid-feedback">
                                                    Please fill in the title.
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Content<sup class="text-primary">&#10033;</sup></label>
                                                        <textarea class="summernoteQuote"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-1 mb-3">
                                            <div class="text-center mb-4">
                                                <h6><strong>&mdash; QUOTATION FEES &mdash;</strong></h6>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDelayFee">
                                                        <label for="addStandardRate">Standard Rate(&#8369;)</label>
                                                        <input type="text" name="addStandardRate" id="addStandardRate" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpDelayFee">
                                                        <label for="addDelayFee">Tugboat Delay Fee (&#8369;)</label>
                                                        <input type="text" name="addDelayFee" id="addDelayFee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group helpViolationFee">
                                                        <label for="addViolationFee">Violation Fee (&#8369;)</label>
                                                        <input type="text" name="addViolationFee" id="addViolationFee" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group helpLateFee">
                                                        <label for="addLateFee">Consignee Late Fee (&#8369;)</label>
                                                        <input type="text" name="addLateFee" id="addLateFee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group helpDamageFee">
                                                        <label for="addDamageFee">Damage Fee (&#8369;)</label>
                                                        <div class="input-group">
                                                            <input type="text" id="minDamageFee" class="form-control" placeholder="Minimum">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">&amp;</span>
                                                            </div>
                                                            <input type="text" id="maxDamageFee" class="form-control" placeholder="Maximum">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group helpDiscount">
                                                        <label for="addDiscount">Discount (&#37;)</label>
                                                        <input id="discountRange" name="addDiscount" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="postQuotation()" id="preventButton" class="float-right btn btn-primary waves-effect">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <section class="sectionDark">
                        <div class="container">
                            <h5 class="section-header text-center" style="text-transform: uppercase;">
                          Quotation List  
                        </h5>
                        </div>
                        <div class="container">
                            <div class="card text-center">
                                <div class="card-header bg-primary text-white">
                                    <h4>Quotation 2</h4>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="float-left mt-2" data-toggle="modal" data-target="#viewQuoteInfo">
                              More Info <i class="ion ion-ios-arrow-right"></i>
                            </a>
                                    <button type="button" class="delItem btn btn-sm btn-danger waves-effect waves-circle float-right" data-toggle="tooltip" title="Delete">
                                        <i class="miniIcon fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit" data-toggle="modal" data-target="#editQuoteInfo">
                                        <i class="miniIcon ion ion-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection