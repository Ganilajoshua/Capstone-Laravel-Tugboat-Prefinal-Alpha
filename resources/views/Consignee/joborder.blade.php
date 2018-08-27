{{-- @extends('Consignee.Templates.ConsigneeTemplate')

@section('styles')
@endsection
@section('scripts')
@endsection
@section('content')
    <input type="hidden">
                <section class="p-t-20" style="margin-top: 50px;">
                    <div class="container" style="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="nav nav-pills flex-column" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="navFirstTab" data-toggle="tab" href="#firstTab" role="tab" aria-selected="true">Add Job Order</a>
                                                    </li>
                                                    <hr>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="navSecondTab" data-toggle="tab" href="#secondTab" role="tab" aria-selected="true">Created Job Orders</a>
                                                    </li>
                                                    <hr>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="navThirdTab" data-toggle="tab" href="#thirdTab" role="tab" aria-selected="false">Pending Requests<span class="badge badge-danger ml-2">17</span></a>
                                                    </li>
                                                    <hr>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="navFourthTab" data-toggle="tab" href="#fourthTab" role="tab" aria-selected="true">Ongoing Job Order /s</a>
                                                    </li>
                                                    <hr>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="navFifthTab" data-toggle="tab" href="#fifthTab" role="tab" aria-selected="false">Job Order History</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="card" id="cardJO">
                                            <div id="titleJO" class="card-header bg-primary text-white text-center">
                                                Add Job Order
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <!-- Add Job Order -->
                                                    <div class="tab-pane show active animated slideInRight faster" id="firstTab" role="tabpanel" aria-labelledby="navFirstTab">
                                                        <form class="needs-validation" novalidate="">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="addTransacDate">Transaction Date<sup class="text-primary">&#10033;</sup></label>
                                                                        <div class="input-group date" id="addTransacDate" data-target-input="nearest">
                                                                            <input type="text" class="form-control datetimepicker-input" data-target="#addTransacDate" placeholder="MM/DD/YYYY" required>
                                                                            <div class="input-group-append" data-target="#addTransacDate" data-toggle="datetimepicker">
                                                                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-calendar"></i></button>
                                                                            </div>
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the Transaction Date.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="addHaulingETA">Estimated Time of Hauling<sup class="text-primary">&#10033;</sup></label>
                                                                        <div class="input-group date" id="addHaulingETA" data-target-input="nearest">
                                                                            <input type="text" class="form-control datetimepicker-input" data-target="#addHaulingETA" placeholder="21:00" required>
                                                                            <div class="input-group-append" data-target="#addHaulingETA" data-toggle="datetimepicker">
                                                                                <button type="button" class="btn btn-outline-primary waves-effect"><i class="fa fa-clock"></i></button>
                                                                            </div>
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the Estimated Time of Hauling.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="firstRow">
                                                                <div class="col-12 col-sm-12 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="cargoName1">Cargo Name 1<sup class="text-primary">&#10033;</sup></label>
                                                                        <input type="text" class="form-control" id="cargoName1" placeholder="Energy Moon" required>
                                                                        <div class="invalid-feedback">
                                                                            Please fill in the Cargo Name.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="cargoWeight1">Cargo Weight 1<sup class="text-primary">&#10033;</sup></label>
                                                                        <div class="input-group">
                                                                            <input id="cargoWeight1" type="number" class="form-control" placeholder="20" required>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">Tons</span>
                                                                            </div>
                                                                            <div class="invalid-feedback">
                                                                                Please fill in the Cargo Weight.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="addGoods1">Goods to be delivered 1<sup class="text-primary">&#10033;</sup></label>
                                                                        <input type="text" class="form-control" id="addGoods1" placeholder="Very Good" required>
                                                                        <div class="invalid-feedback">
                                                                            Please fill in the Estimated Goods to be delivered.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="float-right">
                                                                        <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnRemoveFields" data-toggle="tooltip" title="Delete Fields">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary btn-sm text-center waves-effect btnAddFields" data-toggle="tooltip" title="Add Fields">
                                                                            <i class="fas fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="addExDetails">Extra Details</label>
                                                                <textarea class="form-control" id="addExDetails" rows="5"></textarea>
                                                            </div>
                                                            <button class="btn btn-primary float-right waves-effect submitJO">Submit</button>
                                                        </form>
                                                    </div>
                                                    <!-- Created Job Orders -->
                                                    <div class="tab-pane" id="secondTab" role="tabpanel" aria-labelledby="navSecondTab">
                                                        <div class="row">
                                                            <div class="rs-select2--dark rs-select2--md mb-4 ml-3 sortCards">
                                                                <select class="js-select2" name="selectSort">
                                                                    <option selected="selected">Date</option>
                                                                    <option value="">Job Order #</option>
                                                                    <option value="">Name</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-lg-6 createdCards">
                                                                <div class="card card-sm-2 card-primary border-primary">
                                                                    <div class="card-icon">
                                                                        <i class="ion ion-android-boat text-primary"></i>
                                                                    </div>
                                                                    <div class="card-header">
                                                                        <h4 class="text-primary mb-2">Job Order # 17</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h5>Consignee Name</h5>
                                                                    </div>
                                                                    <div class="card-footer mt-2">
                                                                        <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                        <button class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect btnDeleteJO">Delete</button>
                                                                        <button class="btn btn-secondary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#JOeditModal">Edit</button>
                                                                        <button class="btn btn-primary btn-sm text-center float-right waves-effect btnRequestJO">Request</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-12 col-lg-6 createdCards">
                                                                <div class="card card-sm-2 card-primary border-primary">
                                                                    <div class="card-icon">
                                                                        <i class="ion ion-android-boat text-primary"></i>
                                                                    </div>
                                                                    <div class="card-header">
                                                                        <h4 class="text-primary mb-2">Job Order # 17</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h5>Consignee Name</h5>
                                                                    </div>
                                                                    <div class="card-footer mt-2">
                                                                        <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                        <button class="btn btn-danger btn-sm text-center float-right ml-2 waves-effect btnDeleteJO">Delete</button>
                                                                        <button class="btn btn-secondary btn-sm text-center float-right ml-2 waves-effect" data-toggle="modal" data-target="#JOeditModal">Edit</button>
                                                                        <button class="btn btn-primary btn-sm text-center float-right waves-effect btnRequestJO">Request</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Pending Job Orders -->
                                                    <div class="tab-pane" id="thirdTab" role="tabpanel" aria-labelledby="navThirdTab">
                                                        <div class="row">
                                                            <div class="rs-select2--dark rs-select2--md mb-4 ml-3 sortCards">
                                                                <select class="js-select2" name="selectSort">
                                                                    <option selected="selected">Date</option>
                                                                    <option value="">Job Order #</option>
                                                                    <option value="">Name</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-lg-6 pendingCards">
                                                                <div class="card card-sm-2 card-primary border-primary">
                                                                    <div class="card-icon">
                                                                        <i class="ion ion-android-boat text-primary"></i>
                                                                    </div>
                                                                    <div class="card-header">
                                                                        <h4 class="text-primary mb-2">Job Order # 4</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h5>Consignee Name</h5>
                                                                    </div>
                                                                    <div class="card-footer mt-2">
                                                                        <a href="#" data-toggle="modal" data-target="#moreInfoModal">More Info <i class="ion ion-ios-arrow-right"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Ongoing Job Orders -->
                                                    <div class="tab-pane" id="fourthTab" role="tabpanel" aria-labelledby="navFourthTab">
                                                        <div class="row">
                                                            <div class="rs-select2--dark rs-select2--md mb-4 ml-3 sortCards">
                                                                <select class="js-select2" name="selectSort">
                                                                    <option selected="selected">Date</option>
                                                                    <option value="">Job Order #</option>
                                                                    <option value="">Name</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                        </div>
                                                    </div>
                                                    <!-- Job Order History -->
                                                    <div class="tab-pane animated slideInRight faster" id="fifthTab" role="tabpanel" aria-labelledby="navThirdTab">
                                                        <div class="table-responsive">
                                                            <table class="detailedTable text-center table table-striped" style="width:100%">
                                                                <thead class="bg-primary">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Transaction Date</th>
                                                                        <th>From</th>
                                                                        <th>To</th>
                                                                        <th class="noSortAction">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>17</td>
                                                                        <td>08/08/2018</td>
                                                                        <td>Baseco Port Area</td>
                                                                        <td>Guadalupe, Makati City</td>
                                                                        <td style="width:20%">
                                                                            <div class="ml-1 mr-1">
                                                                                <button class="btnView btn btn-primary waves-circle waves-effect" data-toggle="tooltip" title="View Details" role="button">
                                                                                    <i class="bigIcon fa fa-eye"></i>
                                                                                </button>
                                                                                <button class="btn btn-success waves-circle waves-effect" data-toggle="tooltip" title="Print" role="button">
                                                                                    <i class="bigIcon fa fa-print"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right paginateJO">
                                                <nav class="d-inline-block">
                                                    <ul class="pagination mb-0">
                                                        <li class="page-item disabled">
                                                            <a class="page-link" href="#" tabindex="-1"><i class="ion ion-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">2</a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#"><i class="ion ion-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection --}}