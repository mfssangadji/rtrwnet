<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Setor;
use App\Models\Hotspot;
use App\Models\Voucher;
use Illuminate\Http\Request;
use WordTemplate;

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
        $voucher = Voucher::all();
        $hotspot = Hotspot::find($request->id);
        return view('auths.hotspot.stock_create', compact('hotspot','voucher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher = Voucher::find($request->voucher_id);
        Stock::create([
            'hotspot_id' => $request->id,
            'voucher_id' => $request->voucher_id,
            'qty' => $request->qty,
            'cost' => ($voucher->price*$request->qty),
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
        $voucher = Voucher::all();
        $hotspot = Hotspot::find($request->id);
        $stock = Stock::find($request->sid);
        return view('auths.hotspot.stock_edit', compact('hotspot','voucher', 'stock'));
    }

    public function setor(Request $request)
    {
        $hotspot = Hotspot::find($request->id);
        $stock = Stock::find($request->sid);
        return view('auths.hotspot.stock_setor', compact('hotspot', 'stock'));
    }

    public function psetor(Request $request)
    {
        Setor::create([
            'stock_id' => $request->sid,
            'jumlah_setor' => $request->jumlah_setor,
            'tanggal_setor' => $request->tanggal_setor,
        ]);

        return redirect(config('app.root').'/hotspot/'.$request->id.'/stock');
    }

    public function reset(Request $request)
    {
        Setor::where('stock_id', $request->sid)->delete();
        return redirect()->back();
    }

    public function invoice(Request $request)
    {   
        $stock = Stock::find($request->sid);
        // return $stock;
        $file = public_path('template/invoicepengambilan.rtf');
        $array = array(
            '[AGEN]' => $stock->hotspot->name,
            '[POINT]' => $stock->hotspot->agent_point,
            '[JUMLAH]' =>  $stock->qty,
            '[VOUCHER]' => $stock->voucher->name,
            '[HARGA]' => 'Rp. '.number_format($stock->voucher->price),
            '[TOTAL]' => 'Rp. '.number_format($stock->voucher->price*$stock->qty),
            '[TANGGAL]' => $stock->created_at->format('d F Y'),
        );


        $filename = $stock->hotspot->name.'.doc';
        return WordTemplate::export($file, $array, $filename);
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
        $voucher = Voucher::find($request->voucher_id);
        Stock::where('id', $request->sid)
        ->update([
            'voucher_id' => $request->voucher_id,
            'qty' => $request->qty,
            'cost' => ($voucher->price*$request->qty),
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
