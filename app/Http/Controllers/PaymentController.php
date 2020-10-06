<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use App\Models\Packet;
use App\Models\Customer;
use WordTemplate;
use Terbilang;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pembayaran(Request $request, $id)
    {
        $invoice = Invoice::orderBy('id','DESC')->where('customer_id', $id)->get();
        return view('auths.customers.payment', compact('invoice', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $invoice = Customer::find($request->id)->invoice->where('status', 0)->get()->last();
        return view('auths.customers.payment_create', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::find($request->id);
        $payment = Payment::create([
            'customer_id' => $customer->id,
            'invoice_id' => $customer->invoice->id,
            'bill_cost' => $customer->packet->price,
        ]);

        if($payment){
            Invoice::where('id', $customer->invoice->id)
            ->update([
                'status' => '1',
            ]);

            return redirect()->back();
        }
    }

    public function cancel(Request $request)
    {
        $payment = DB::table('payment')->where('customer_id', $request->id)
                                       ->where('invoice_id', $request->inid)->delete();
        if($payment){
            Invoice::where('id', $request->inid)
            ->update([
                'status' => '0',
            ]);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment, Request $request)
    {
        Invoice::destroy($request->inid);
        return redirect()->back();
    }
}
