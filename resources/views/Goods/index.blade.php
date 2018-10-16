@extends('Templates.newTemplate')

{{-- Local Style --}}
@section('assets')

@endsection

{{-- Local Scripts --}}
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
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Goods</th>

                            <th>Status</th>
                            <th class="noSortAction">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($goods as $goods)
                            <tr>
                                <td>{{$goods->strGoodsName}}</td>
                                <td>
                                    @if($goods->isActive == 1)
                                        <div class="goodsCheckbox" data-id="{{$goods->intGoodsID}}">
                                            <label>
                                                <input type="checkbox" checked data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$goods->intGoodsID}}">
                                            </label>
                                        </div>
                                    @elseif($goods->isActive == 0)
                                        <div class="goodsCheckbox" data-id="{{$goods->intGoodsID}}">
                                            <label> 
                                                <input type="checkbox" data-size="small" data-width="" data-toggle="toggle"data-onstyle="success"data-offstyle="danger" data-on="Active" data-off="Inactive" data-id="{{$goods->intGoodsID}}">
                                            </label>
                                        </div>
                                    @endif
                                </td>
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
                <table class="detailedTable table table-striped text-center  mainTable" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>Goods</th>
                            <th>Rate per Ton</th>
                            <th>Status</th>
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
