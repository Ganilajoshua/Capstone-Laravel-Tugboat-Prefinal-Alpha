@extends('Templates.newTemplate')

@section('assets')
    {{-- @include('Berth.scripts') --}}
@endsection
@section('scripted')
    @include('Goods.scripts')
@endsection
@section('content')
<section class="section">
    <h1 class="section-header">
        <div>
        Goods
        <small class="ml-1 smCat">
            Maintenance
        </small>
        </div>
    </h1>
    <div id="detLayout" class="detLayout mt-3">
        <button id="addGoodsButton" class="detAdd btn btn-primary text-center border-dark bounceIn animated">
            Add
        </button>
        <div class="mt-3">
            @if(count($goods)>0)    
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Goods</th>
                            <th>Rate per Ton</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($goods as $goods)
                            <tr>
                                <td>{{$goods->strGoodsName}}</td>
                                <td>&#8369; {{$goods->fltRateperTon}}</td>
                                <td>
                                    <div class="ml-1 mr-1">
                                        <button onclick="editGoods({{$goods->intGoodsID}})" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit" role="button">
                                            <i class="miniIcon fas fa-edit custSize"></i>
                                        </button>
                                        <button onclick="deleteGoods({{$goods->intGoodsID}})" class="btn btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">
                                            <i class="miniIcon fas fa-trash custSize"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="detailedTable table table-striped text-center table-bordered mainTable" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Goods</th>
                            <th>Rate per Ton</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</section>
@include('Goods.create')
@include('Goods.edit')
@endsection
