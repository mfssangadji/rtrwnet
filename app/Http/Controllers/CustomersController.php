<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;
use WordTemplate;
use Terbilang;
use Carbon\Carbon;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('auths.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packet = Packet::all();
        return view('auths.customers.create', compact('packet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'packet_id' => $request->packet_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        Invoice::create([
            'customer_id' => $customer->id,
            'invoice_number' => '#'.rand(1111111,9999999),
        ]);

        return redirect()->route('customers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $packet = Packet::all();
        $customer = Customer::find($customer->id);
        return view('auths.customers.edit', compact('packet','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        Customer::where('id', $customer->id)
        ->update([
            'packet_id' => $request->packet_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect()->back();
    }
}
