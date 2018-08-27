@extends('Templates.newTemplate')

@section('assets')
    @include('Tugboat.style')
    @include('Tugboat.scripts')
@endsection

@section('outside')
@include('Tugboat.info')
@include('Tugboat.summary')
@endsection
@section('content')
<section id="sectionOne" class="section">
    <h1 class="section-header">
        <div>
            Tugboat
            <small class="ml-1 smCat">
            Maintenance
            </small>
        </div>
    </h1>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
            <form class="selectViews">
                <div class="btn-group mt-3 btn-group-toggle" id="sbtn" role="group" aria-label="Button group with nested dropdown">
                    <button id="detView" type="button" class="btn btn-secondary btn-lg" data-toggle="tooltip" title="Detailed View"><i class="fas fa-align-left"></i></button>
                    <button id="cardView" type="button" class="btn btn-secondary btn-lg active" data-toggle="tooltip" title="Card View"><i class="fas fa-credit-card"></i></button>
                    <div id="sortSelect" class="btn-group" role="group">
                        <button id="sortDdown" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a id="sortName" class="dropdown-item active" href="#">Name</a>
                            <a id="sortHP" class="dropdown-item" href="#">Horse Power</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('Tugboat.card')
    @include('Tugboat.add')
    @include('Tugboat.info')
    @include('Tugboat.table')
    @include('Tugboat.edit')
</section>
@endsection

@section('scripted')
<script type="text/javascript">
    $()
</script>
@endsection