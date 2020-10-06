<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packet = Packet::all();
        return view('auths.packet.index', compact('packet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auths.packet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Packet::create([
            'packet_name' => $request->packet_name, 
            'price' => $request->price, 
        ]);

        return redirect()->route('packet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packet  $packet
     * @return \Illuminate\Http\Response
     */
    public function show(Packet $packet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packet  $packet
     * @return \Illuminate\Http\Response
     */
    public function edit(Packet $packet)
    {
        $packet = Packet::find($packet->id);
        return view('auths.packet.edit', compact('packet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packet  $packet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packet $packet)
    {
        Packet::where('id', $packet->id)
        ->update([
            'packet_name' => $request->packet_name,
            'price' => $request->price,
        ]);

        return redirect()->route('packet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packet  $packet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packet $packet)
    {
        Packet::destroy($packet->id);
        return redirect()->back();
    }
}
