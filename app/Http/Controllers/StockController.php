<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Hotspot;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $hotspot = Hotspot::find($request->id);
        return view('auths.hotspot.stock', compact('hotspot', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $hotspot = Hotspot::find($request->id);
        return view('auths.hotspot.stock_create', compact('hotspot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stock::create([
            'hotspot_id' => $request->id,
            'qty' => $request->qty,
            'cost' => (4000*$request->qty),
            'description' => $request->description,
        ]);

        return redirect(config('app.root').'/hotspot/'.$request->id.'/stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock, Request $request)
    {
        $hotspot = Hotspot::find($request->id);
        $stock = Stock::find($request->sid);
        return view('auths.hotspot.stock_edit', compact('hotspot', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        Stock::where('id', $request->sid)
        ->update([
            'qty' => $request->qty,
            'cost' => (4000*$request->qty),
            'description' => $request->description,
        ]);

        return redirect(config('app.root').'/hotspot/'.$request->id.'/stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock, Request $request)
    {
        Stock::destroy($request->sid);
        return redirect()->back();
    }
}
