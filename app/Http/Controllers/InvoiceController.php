<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Packet;
use App\Models\Customer;
use App\Models\Payment;
use WordTemplate;
use Terbilang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice(Customer $customer, $id)
    {
        $customer = Customer::where('id', $id)->whereHas('invoice', function($q)
        {
            $q->where('status', '=', 0);

        })->get()->first();

        

        $file = public_path('template/invoice.rtf');
        $date = Carbon::create(
                    $customer->invoice->created_at->format('Y'), 
                    $customer->invoice->created_at->format('m'), 
                    $customer->invoice->created_at->format('d'), 
                    0
                );

        $start_service = $date->format('d F Y');
        $date->addMonth();
        $end_service = $date->format('d F Y');

        $due_date = Carbon::create(
                    $customer->invoice->created_at->format('Y'), 
                    $customer->invoice->created_at->format('m'), 
                    $customer->invoice->created_at->format('d'), 
                    0
                );

        $due_date->addMonth();
        $due_date->subDay(3);
        $start_due_date = $due_date->format('d F Y');
        $due_date->addDay(3);
        $end_due_date = $due_date->format('d F Y');

        $array = array(
            '[TO]' => $customer->name,
            '[ADDRESS]' => $customer->address,
            '[INVOICE_NUMBER]' =>  $customer->invoice->invoice_number,
            '[SERVICE_PERIOD]' => $start_service. ' sd '.$end_service,
            '[DUE_DATE]' => $start_due_date. ' sd '.$end_due_date,
            '[PACKET_NAME]' => $customer->packet->packet_name,
            '[PRICE]' => 'Rp. '.number_format($customer->packet->price),
            '[TOTAL_PRICE]' => 'Rp. '.number_format($customer->packet->price),
            '[IN_NUMBER]' => ucwords(Terbilang::make($customer->packet->price)).' Rupiah',
            '[PRINT_DATE]' => date('d F Y'),
        );

        $filename = $customer->invoice->invoice_number.'-'.$customer->name.'.doc';
        return WordTemplate::export($file, $array, $filename);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
