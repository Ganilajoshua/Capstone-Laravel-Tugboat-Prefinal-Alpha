@extends('Templates.newTemplate')

{{-- Local Styles --}}
@section('assets')
    @include('Tugboat.style')
@endsection

{{-- Local Scripts --}}
@section('scripted')
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
            <div class="btn-group btn-group-toggle" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="detView btn btn-secondary waves-effect" data-toggle="tooltip" title="Detailed View"><i class="fas fa-align-left"></i></button>
                <button type="button" class="cardView btn btn-secondary active waves-effect" data-toggle="tooltip" title="Card View"><i class="fas fa-credit-card"></i></button>
                <!-- <div class="sortSelect btn-group" role="group">
                    <button class="sortDdown btn btn-primary dropdown-toggle waves-effect" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="sortName dropdown-item active waves-effect" href="#">Name</a>
                        <a class="sortHP dropdown-item waves-effect" href="#">Horse Power</a>
                    </div>
                </div> -->
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