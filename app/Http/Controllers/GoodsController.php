<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Goods;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::where('boolDeleted',0)->get();
        return view('Goods.index')->with('goods',$goods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goods =  new Goods;
        $goods->timestamps = false;
        $goods->strGoodsName = $request->goodsName;
        $goods->save();
        return response()->json(['goods'=>$goods]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($intGoodsID)
    {
        $goods = Goods::findOrFail($intGoodsID);
        return response()->json(['goods'=>$goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $goods = Goods::findOrFail($request->goodsID);
        $goods->timestamps = false;
        $goods->strGoodsName = $request->goodsName;
        $goods->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($intGoodsID)
    {
        //
    }

    public function delete($intGoodsID)
    {
        $goods = Goods::findOrFail($intGoodsID);
        $goods->timestamps = false;
        $goods->boolDeleted = 1;
        $goods->save();
        return response()->json(['goods'=>$goods]);
    }
    public function activate(Request $request)
    {
        $goods = Goods::findOrFail($request->activateID);
        if($goods->isActive == 0){
            $goods->timestamps = false;
            $goods->isActive = 1;
            $goods->save();
        }else{
            $goods->timestamps = false;
            $goods->isActive = 0;
            $goods->save();
        }
        return response(['goods'=>$goods]);
    }
}
