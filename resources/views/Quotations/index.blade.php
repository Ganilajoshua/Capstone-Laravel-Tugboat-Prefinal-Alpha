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
            <div class="col-lg-8 animated fadeIn createForm">
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
                                                <input type="text" name="addQuoteTitle" class="form-control" id="quotationTitle" required>
                                                <div class="invalid-feedback">
                                                    Please fill in the title.
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Content<sup class="text-primary">&#10033;</sup></label>
                                                        <textarea class="summernoteQuote" id="quotationDetails"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary btn-block text-center waves-effect btnAddFields" data-toggle="tooltip" title="Add Quotation Fields">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-3" id="firstRow"></div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" onclick="postQuotation()" class="float-right btn btn-primary waves-effect">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @include('Quotations.edit')   
            <div class="col-lg-4 animated fadeIn quotationsList">
                <div class="card">
                    <section class="sectionDark">
                        <div class="container">
                            <h5 class="section-header text-center" style="text-transform: uppercase;">
                              Quotation List  
                            </h5>
                        </div>
                        <div class="container">
                            @if(count($quotations)>0)
                                @foreach($quotations as $quotations)
                                    <div class="card text-center" id="card{{$quotations->intQuotationID}}">
                                        <div class="card-header bg-primary text-white">
                                            <h4>{{$quotations->strQuotationTitle}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <a id="showInfo" onclick="showQuotation({{$quotations->intQuotationID}})" href="#" class="float-left mt-2" data-toggle="modal" data-target="#viewQuoteInfo">
                                                More Info <i class="ion ion-ios-arrow-right"></i>
                                            </a>
                                            <button type="button" onclick="deleteQuotation({{$quotations->intQuotationID}})" class="btn btn-sm btn-danger waves-effect waves-circle float-right" data-toggle="tooltip" title="Delete">
                                                <i class="miniIcon fas fa-trash"></i>
                                            </button>
                                            <button type="button" onclick="getQuotation({{$quotations->intQuotationID}})" class="btn btn-sm btn-secondary waves-effect waves-circle float-right mr-2" data-tooltip="tooltip" title="Edit" data-toggle="modal" data-target="#editQuoteInfo">
                                                <i class="miniIcon ion ion-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>     
    </section>
    {{-- @include('Quotations.scripts') --}}
    @include('Quotations.info')
@endsection
