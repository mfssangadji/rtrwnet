<?php

namespace App\Http\Controllers;

use App\Models\Hotspot;
use Illuminate\Http\Request;

class HotspotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotspot = Hotspot::orderBy('id', 'DESC')->get();
        return view('auths.hotspot.index', compact('hotspot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auths.hotspot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hotspot::create([
            'name' => $request->name,
            'agent_point' => $request->agent_point,
            'phone' => $request->phone,
        ]);

        return redirect()->route('hotspot');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function show(Hotspot $hotspot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotspot $hotspot)
    {
        $hotspot = Hotspot::find($hotspot->id);
        return view('auths.hotspot.edit', compact('hotspot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotspot $hotspot)
    {
        Hotspot::where('id', $hotspot->id)
        ->update([
            'name' => $request->name,
            'agent_point' => $request->agent_point,
            'phone' => $request->phone,
        ]);

        return redirect()->route('hotspot');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotspot $hotspot)
    {
        Hotspot::destroy($hotspot->id);
        return redirect()->back();
    }
}
