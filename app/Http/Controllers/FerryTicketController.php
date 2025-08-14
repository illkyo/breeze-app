<?php

namespace App\Http\Controllers;

use App\Models\Ferry;
use App\Models\FerryTicket;
use Illuminate\Http\Request;

class FerryTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function create(Ferry $ferry)
    {
        return view('ferry-tickets.create', ['ferry' => $ferry]);
    }

    public function store(Request $request, Ferry $ferry)
    {
        $attributes = $request->validate([
            'visitor_count' => ['required', 'integer', 'min:1', 'max:10'],
            'total_price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
        ]);
        $attributes['ferry_id'] = $ferry->id;
        session(['ticket_info' => $attributes]);

        return redirect()->route('ferry.payment', ['ferry' => $ferry]);
    }


    public function show(FerryTicket $ferryTicket)
    {
        $ferry = Ferry::find($ferryTicket['id']);
        return view('ferry-tickets.show', ['ferryTicket' => $ferryTicket, 'ferry' => $ferry]);
    }


    public function edit(FerryTicket $ferryticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FerryTicket $ferryticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FerryTicket $ferryticket)
    {
        //
    }
}
