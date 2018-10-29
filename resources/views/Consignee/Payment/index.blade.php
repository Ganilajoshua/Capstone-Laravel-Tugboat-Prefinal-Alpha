@extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
    @include('Consignee.Payment.styles')
@endsection

@section('scripts')
    @include('Consignee.Payment.scripts')
@endsection

@section('content')
<section class="section" style="margin-top:25px;">
	<form action="">
		<div class="container">
			<div class="row">
				<div class="cardPayChoices col-12 col-sm-12 col-lg-8">
					<div class="card">
						<div class="card-header">Choose Payment Option</div>
						<div class="card-body">
							<div class="row container">
								<div class="card cardCheque col-12 col-lg-5 col-sm-12 border-primary2 ml-2">
									<i class="iconCheque fas fa-money-check bigIconP text-primary text-center mb-2 mt-3"></i>
									<h4 class="txtCheque text-center text-primary mb-3">Cheque</h4>
								</div>
								<div class="card cardCash col-12 col-lg-5 col-sm-12 border-secondary2 ml-2">
									<i class="iconCash fas fa-money-bill bigIconP text-black text-center mb-2 mt-3"></i>
									<h4 class="txtCash text-center mb-3">Cash</h4>
								</div>
							</div>
							<hr>
							
							<div class="chequeDetails animated fadeIn fast">
							@foreach ($Company as $Company)
								<hr>
							<div class="alert alert-info"><i class="bigIcon fas fa-info-circle mr-2"></i>Your remaining balance :  &#8369;	{{$Company->fltBalance}}</div>
							<input type="text" value="{{$Company->fltBalance}}" id="balance" hidden>
								<hr>
								<div class="row mt-2">
									<div class="col-6">
										<ul class="list-inline">
											<li class="list-inline-item text-primary">
												<h5>Name : </h5>
											</li>
											<li class="list-inline-item">
												<h5 class="text-primary">{{$Company->strCompanyName}}</h5>
											</li>
										</ul>
										<ul class="list-inline">
											<li class="list-inline-item text-primary">
												<h5>Address : </h5>
											</li>
											<li class="list-inline-item">
												<h5 class="text-primary">{{$Company->strCompanyAddress}}</h5>
											</li>
										</ul>
									@endforeach
									</div>
									<div class="col-12 col-sm-12 col-lg-3">
										<div class="form-group">
											<label for="chequeDate">Date<sup class="text-primary">&#10033;</sup></label>
											<div class="input-group date" id="chequeDate" data-target-input="nearest">
												<input id="cDate" type="text" class="form-control datetimepicker-input" data-target="#chequeDate" placeholder="MM/DD/YYYY" required>
												<div class="input-group-append" data-target="#chequeDate" data-toggle="datetimepicker">
													<button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
												</div>
												<div class="invalid-feedback">
													Please fill in the Date.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-12 col-sm-12 col-lg-8">
										<div class="form-group">
											<label for="">Cheuqe Number</label>
											<input type="number" class="form-control" name="chequeNum[]" id="chequeNum" placeholder="0790">
											<label for="payeeLine">Pay to the Order Of<sup class="text-primary">&#10033;</sup></label>
											<input type="text" class="form-control" id="payeeLine" value="Tugmaster Bargepool" placeholder="Tugmaster Bargepool" disabled>
											<div class="invalid-feedback">
												Please fill in the Payee.
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-12 col-lg-4">
										<div class="form-group">
											<label for="chequeAmount">Amount<sup class="text-primary">&#10033;</sup></label>
											<div class="input-group">
												<input id="chequeAmount" type="number" name="chequeAmount[]" class="form-control" placeholder="12000" required>
												<div class="input-group-append">
													<span class="input-group-text">&#8369;</span>
												</div>
												<div class="invalid-feedback">
													Please fill in the Amount.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="amountWords" placeholder="Twelve Thousand" required readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<ul class="list-inline">
											<li class="list-inline-item">
												<h6 class="text-primary">Bank of the Philippine Islands</h6>
											</li>
										</ul>
										<ul class="list-inline">
											<li class="list-inline-item">
												<h6>Bank Location</h6>
											</li>
										</ul>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-6 col-sm-6 col-lg-6">
										<ul class="list-inline">
											<li class="list-inline-item text-primary">
												<h5>Memo : </h5>
											</li>
											<li class="list-inline-item">
												<div class="form-group">`
													<input type="text" class="form-control" name="chequeMemo[]" id="chequeMemo">
												</div>
											</li>
										</ul>
									</div>
								</div>
							
							<div id="append">

							</div>

							<button id="addCheque" class="btn btn-primary waves-effect float-right">New Cheque</button>
							</div>
							
							<div class="cashDetails animated fadeIn fast">
								<h5>Pay to Tugmaster Personally</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="cardPaymentSummary col-12 col-sm-12 col-lg-4">
					<div class="card">
						<div class="card-header">Payment Summary</div>
						<div class="card-body">
							<div class="alert alert-info"><i class="bigIcon fas fa-info-circle mr-2"></i>Click the Bill Number for more Info.</div>
							<div class="table-responsive">
								<table class="table table-striped border-primary text-center" style="width:100%">
									<thead class="bg-primary text-white border-primary">
										<th>Bill #</th>
										<th>Amount</th>
									</thead>
									<tbody class="text-black" >
							{{-- ekk --}}
							@foreach ($dispatch as $dispatch)
								<tr>
									<td class="tdBorderLeft"><a href="#" class="btnBillInfo" onclick="billinfo({{$dispatch->intInvoiceID}})">{{$dispatch->intInvoiceID}}</a></td>
									<td>&#8369; {{$dispatch->fltBalanceRemain}}</td>
								</tr>
							@endforeach
								<tr>
									<td class="tdBorderLeft ">Total</td>
									<td>&#8369; {{$amount}}</td>
								</tr>
							{{-- ekk --}}	
									</tbody>
								</table>
							</div>
						</div>
						<select name="" id="amount" hidden>
							<option value="{{$amount}}"></option>
						</select>
						<select name="" id="fltBalance" hidden>
							<option value="{{$Company->fltBalance}}"></option>
						</select>
						
						<input type="text" id="idBill" value="{{$Bill}}" hidden>
						<input type="text" id="fee" value="{{$amount}}" hidden>
						<div class="card-footer"style="background:#fff;border-top: 0px;">
							<button type="submit" class="btn btn-primary waves-effect float-right" onclick="validate({{$amount}})">PLACE PAYMENT</button>
							{{-- <button class="btn btn-primary waves-effect float-right" onclick="Finalize({{$Bill}})">PLACE PAYMENT</button> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
	@include('Consignee.Payment.info')
	@include('Consignee.Payment.applysign')
@endsection